<?php


namespace App\Http\Controllers\Auth;


use App\Http\Requests\UserItemRequest;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserItemsController
{

    public function index()
    {
        $regions = Region::all();
        return view("auth.profile_items", compact('regions'))->with(['user_phone' => User::find(Session::get("user_id"))->phone]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'max:25'],
            'last_name' => ['required', 'max:25'],
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'address' => ['required'],
            'avatar' => ['required', 'mimes:jpeg,jpg,png']
        ]);

            $file = $request->file('avatar');
            $image_name = time() . '.' . $file->getClientOriginalName();
            $destinationPath = public_path('avatars');
            $file->move($destinationPath,$image_name);
            $request['avatar'] = $image_name;


        $res = User::query()
            ->where('id', Session::get("user_id"))
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'avatar' => $image_name,
                'city_id' => $request->city_id,
                'is_completed' => true
            ]);
        if ($res){
            Auth::login(User::find(Session::get('user_id')));
            Session::forget("user_id");
            return redirect(url("home"));
        }
    }

}
