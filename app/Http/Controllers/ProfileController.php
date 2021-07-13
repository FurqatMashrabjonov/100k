<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Like;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Referal;
use App\Models\Region;
use App\Models\Team;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function getBalanceHistoryView()
    {
        $payments = Payment::query()
            ->where("user_id", \auth()->user()->getAuthIdentifier())
            ->with(['status_one'])
            ->get();
        return view("profile.balance_history", compact("payments"));
    }

    public function getFavoritesView()
    {
        return view("profile.favorites");
    }

    public function getAboutView()
    {
        return view("about");
    }

    public function getRequestsView()
    {
        $requests = [];
        $referals = Referal::query()
            ->where("user_id", \auth()->user()->getAuthIdentifier())
            ->with(['checkouts' => function ($query) {
                $query->with(['get_requests', 'product', 'reason']);
            }])
            ->get();

        foreach ($referals as $referal) {
            foreach ($referal->checkouts as $checkout) {
                foreach ($checkout->get_requests as $get_request) {
                    $request = \App\Models\Request::query()->where("id", $get_request->id)->first();
                    array_push($requests, $request);
                }
            }
        }

        return view("profile.requests", compact('requests'));
    }

    public function getDiagramsView()
    {
        return view("profile.diagrams");
    }

    public function getTeamView()
    {
        $team_url = teamUrlMaker(\auth()->user()->token);
        $my_teams = Team::query()
            ->where("user_ref_id", \auth()->user()->getAuthIdentifier())
            ->with(['user'])
            ->get();
        return view("profile.team", compact("team_url", "my_teams"));
    }

    public function getMyOrdersView()
    {
        $orders = [];
        return view("profile.orders", compact("orders"));
    }

    public function getSubwayView()
    {
        return view("profile.subway");
    }

    public function getSettingsView()
    {
        $regions = Region::all();
        return view("profile.settings", compact("regions"));
    }

    public function updateUSer(Request $request)
    {
        $request->validate([
            'first_name' => ['max:25'],
            'last_name' => ['max:25'],
            'city_id' => ['numeric', 'exists:cities,id'],
            'address' => ['string'],
            'avatar' => ['mimes:jpeg,jpg,png']
        ]);

        $user = new User();
        if (!empty($request->file("avatar")) and $request->file("avatar")) {

            $file = $request->file('avatar');
            $image_name = time() . '.' . $file->getClientOriginalName();
            $destinationPath = public_path('avatars');
            $file->move($destinationPath, $image_name);
            $request = $request->only($user->getFillable());
            $request['avatar'] = $image_name;

            $res = User::query()
                ->where("id", \auth()->user()->getAuthIdentifier())
                ->update($request);
            if ($res) {
                return redirect(url("home"));
            }
        } else {

            $res = User::query()
                ->where("id", \auth()->user()->getAuthIdentifier())
                ->update($request->only($user->getFillable()));
            if ($res)
                return redirect(url("home"));
        }
    }

    public function getStatistikaView()
    {
        $referals = Referal::query()
            ->where("user_id", auth()->user()->getAuthIdentifier())
            ->with(['product', 'checkouts'])
            ->get();

        $all = ['view' => 0, 'not_saled' => 0, 'deliving' => 0, 'saled' => 0, 'ignore' => 0, 'not_accepted' => 0];

//        $all['view'] += (int)$item->view;
//
//        foreach ($item->checkouts as $checkout){
//            if ($checkout->status === Checkout::NOT_SALED)
//                $all['not_saled'] += 1;
//            else if ($checkout->status === Checkout::DELIVING)
//                $all['deliving'] += 1;
//            else if ($checkout->status === Checkout::SALED)
//                $all['saled'] += 1;
//            else if ($checkout->status === Checkout::IGNORE)
//                $all['ignore'] += 1;
//            else if ($checkout->status === Checkout::NOT_ACCEPTED)
//                $all['not_accepted'] += 1;
//        }
//


        foreach ($referals as $referal) {
            $all['view'] += (int)$referal->view;
            foreach ($referal->checkouts as $checkout) {

                if ($checkout->status === Checkout::NOT_SALED)
                    $all['not_saled'] += 1;
                else if ($checkout->status === Checkout::DELIVING)
                    $all['deliving'] += 1;
                else if ($checkout->status === Checkout::SALED)
                    $all['saled'] += 1;
                else if ($checkout->status === Checkout::IGNORE)
                    $all['ignore'] += 1;
                else if ($checkout->status === Checkout::NOT_ACCEPTED)
                    $all['not_accepted'] += 1;
            }
        }


        $referals = collect($referals);
        $referals = $referals->transform(function ($item, $key) use ($all) {
            return [
                'name' => $item->name,
                'view' => $item->view,
                'not_saled' => collect($item->checkouts)->where("status", Checkout::NOT_SALED)->count(),
                'deliving' => collect($item->checkouts)->where("status", Checkout::DELIVING)->count(),
                'saled' => collect($item->checkouts)->where("status", Checkout::SALED)->count(),
                'ignore' => collect($item->checkouts)->where("status", Checkout::IGNORE)->count(),
                'not_accepted' => collect($item->checkouts)->where("status", Checkout::NOT_ACCEPTED)->count()
            ];
        });

        return view("profile.statistika")->with(['referals' => $referals->toArray(), 'all' => $all]);
    }

    public function getMyLikesView()
    {
        $likes = Like::query()
            ->where("user_id", auth()->user()->getAuthIdentifier())
            ->with(['product'])
            ->get();
        return view('profile.likes', compact('likes'));
    }

    public function getMarketView()
    {
        $types = Type::all();
        $products = Product::all();
        return view("profile.market", compact('products', 'types'));
    }
}
