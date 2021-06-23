<?php


namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    use AuthenticatesUsers;

    public function getLoginForm()
    {
        if (!\auth()->check()) {
            return view('admin.login');
        }else{
            if (\auth()->user()->is_admin){
                return redirect(route("admin.dashboard"));
            }else{
                return redirect(url("home"));
            }
        }
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $user = User::where("email", $request->email)->first();
        if ($user and !empty($user)) {
            if ($user->is_admin) {
                $res = $this->guard()->attempt(
                    $this->credentials($request), $request->filled('remember')
                );
                if ($res) {
                    return redirect(route("admin.dashboard"));
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }

    }
}
