<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Notification;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{
    public function index($token)
    {
        $user = User::query()
            ->where("token", $token)
            ->first();

        if (!empty($user) and $user) {
            if (auth()->check()) {
                if (auth()->user()->getAuthIdentifier() === $user->id) {
                    return abort(404);
                } else {
                    $team = Team::query()->where("user_id", auth()->user()->getAuthIdentifier())
                        ->where("user_ref_id", $user->id)
                        ->first();
                    if (!empty($team) and $team) {
                        return view("profile.confirm_team");
                    } else {
                        $res = Team::query()
                            ->insert([
                                'user_id' => auth()->user()->getAuthIdentifier(),
                                'user_ref_id' => $user->id,
                                'status' => Team::JOINED
                            ]);
                        if ($res)
                            return redirect("/");
                    }

                }
            } else {
                Session::put("user_ref_token", $token);
                return redirect("/login");
            }
        } else {
            return abort(404);
        }
    }
}
