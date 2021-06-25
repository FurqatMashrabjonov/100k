<?php

namespace App\Http\Controllers;

use App\Models\Referal;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getReferalsView()
    {
        $referals = Referal::query()->where("user_id", auth()->user()->getAuthIdentifier())->get();
        return view("profile.referals", compact("referals"));
    }


    public function getAdminView()
    {
        return view("profile.admin");
    }

    public function getFavoritesView()
    {
        return view("profile.favorites");
    }

    public function getSettingsView(){
        return view("profile.settings");
    }
}
