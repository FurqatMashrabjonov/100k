<?php


namespace App\Http\Controllers\Auth;


use App\Helpers\SmsClientHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BeforeLogin
{
    use CreateUserTrait;

    public function index(Request $request)
    {
        $request->validate([
            'phone' => ["required", "min:8"]
        ]);
        $phone = phone_format($request->phone);
        $user = User::query()->where("phone", $phone)->first();
        if (!empty($user) and $user) {
            $phone_token = rand(10000, 99999);
            $res = User::query()
                ->where("id", $user->id)
                ->update([
                    'phone_token' => $phone_token
                ]);

            if ($res) {
                SmsClientHelper::send($user->phone, $phone_token);
                Session::put("user_id", $user->id);
                return view('auth.verify');
            } else {
                return redirect()->back();
            }
        } else {
            $newUser = $this->createUser($phone);
            SmsClientHelper::send($newUser->phone, $newUser->phone_token);
            Session::put("user_id", $newUser->id);
            return view('auth.verify');
        }

    }

    public function verify(Request $request)
    {
        $request->validate([
            'phone_token' => ["required"]
        ]);
        $user = User::where("id", Session::get("user_id"))->first();
        if ($user and !empty($user)) {
            if ((int)$request->phone_token == $user->phone_token) {
                if ($user->is_completed) {
                    Auth::login($user, true);
                    Session::forget("user_id");

                    if (session()->get("user_ref_token") !== null) {
                        return redirect("u/" . \session()->get("user_ref_token"));
                    } else {
                        return redirect(url("home"));
                    }

                } else {
                    return redirect(route("user_items"));
                }
            } else {
                return view("auth.verify")->with(['token_error' => 'Kod xato kiritildi.']);
            }
        }
    }


    public function getVerify()
    {
        $user = User::where("id", Session::get("user_id"))->first();
        if ($user and !empty($user)) {
            $phone_token = rand(10000, 99999);
            User::query()->where("id", Session::get("user_id"))
                ->update([
                    'phone_token' => $phone_token
                ]);
            SmsClientHelper::send($user->phone, $phone_token);
            return view('auth.verify');
        } else {
            return redirect(route("login"));
        }
    }


    public function contact()
    {
        return view("contact");
    }

}
