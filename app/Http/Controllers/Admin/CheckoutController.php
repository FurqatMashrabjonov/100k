<?php


namespace App\Http\Controllers\Admin;


use App\Helpers\TelegramBotHelper;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Discount;
use App\Models\Info;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Referal;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;


class CheckoutController
{
    public function index()
    {
        $checkouts = Checkout::query()->orderBy("created_at", 'desc')->with(['product', 'with_status', 'region'])->get();
        return view("admin.checkout", compact("checkouts"));
    }

    public function checkoutSaled($id)
    {
        $res = Checkout::query()
            ->where("id", $id)
            ->update([
                'status' => Checkout::SALED
            ]);

        $checkout = Checkout::query()->where("id", $id)
            ->with(['referal'])->first();

        $user_id = $checkout->referal->user->id;


        $team = Team::query()
            ->where("user_id", $user_id)
            ->first();

        if (!empty($team) and $team)
            User::query()
                ->where("id", $team->user_ref_id)
                ->increment("balance", (int)$checkout->amount * (Discount::REF_DISCOUNT / 100));

        $info = Info::query()->where("key", "balance_replenished")->first();
        Notification::query()->insert([
            'user_id' => $user_id,
            'info_id' => $info->id,
            'status' => Notification::NOT_VIEWED
        ]);

        if ($res) {

            $checkout = Checkout::query()->where("id", $id)
                ->with(['product', 'referal'])->first();

            if ((int)$checkout->product->count != 0 and ((int)$checkout->product->count >= (int)$checkout->count))
                Product::query()
                    ->where("id", $checkout->product->id)
                    ->decrement("count", (int)$checkout->count);

            if ($checkout->referal !== null) {
                $referal = Referal::query()->where("id", $checkout->referal_id)->first();
                if (!empty($referal) and $referal) {


                    //user balance
                    $balance_pay = Product::query()->where('id', $checkout->product_id)->first()->pay;
                    if ($balance_pay != null)
                        $res = User::query()
                            ->where("id", $referal->user_id)
                            ->increment("balance", (int)$checkout->count * (int)$balance_pay);

                    $info = Info::query()->where("key", "balance_replenished")->first();
                    Notification::query()->insert([
                        'user_id' => $referal->user_id,
                        'info_id' => $info->id,
                        'status' => Notification::NOT_VIEWED
                    ]);

                    if ($res)
                        return redirect(url("admin/checkouts"));

                } else {
                    return "referal not fount";
                }
            } else {
                return $checkout->toArray();
            }
        }
    }

    public function checkoutSaledApi($id)
    {
        $res = Checkout::query()
            ->where("id", $id)
            ->update([
                'status' => Checkout::SALED
            ]);

        $checkout = Checkout::query()->where("id", $id)
            ->with(['referal'])->first();

        $user_id = $checkout->referal->user->id;


        $team = Team::query()
            ->where("user_id", $user_id)
            ->first();

        if (!empty($team) and $team)
            User::query()
                ->where("id", $team->user_ref_id)
                ->increment("balance", (int)$checkout->amount * (Discount::REF_DISCOUNT / 100));

        $info = Info::query()->where("key", "balance_replenished")->first();
        Notification::query()->insert([
            'user_id' => $user_id,
            'info_id' => $info->id,
            'status' => Notification::NOT_VIEWED
        ]);

        if ($res) {

            $checkout = Checkout::query()->where("id", $id)
                ->with(['product', 'referal'])->first();

            if ((int)$checkout->product->count != 0 and ((int)$checkout->product->count >= (int)$checkout->count))
                Product::query()
                    ->where("id", $checkout->product->id)
                    ->decrement("count", (int)$checkout->count);

            if ($checkout->referal !== null) {
                $referal = Referal::query()->where("id", $checkout->referal_id)->first();
                if (!empty($referal) and $referal) {


                    //user balance
                    $balance_pay = Product::query()->where('id', $checkout->product_id)->first()->pay;
                    if ($balance_pay != null)
                        $res = User::query()
                            ->where("id", $referal->user_id)
                            ->increment("balance", (int)$checkout->count * (int)$balance_pay);

                    $info = Info::query()->where("key", "balance_replenished")->first();
                    Notification::query()->insert([
                        'user_id' => $referal->user_id,
                        'info_id' => $info->id,
                        'status' => Notification::NOT_VIEWED
                    ]);

                    if ($res)
                        return TelegramBotHelper::sendTest(Checkout::query()->where('id', $id)->with(['product', 'with_status', 'referal', 'region'])->first());

                } else {
                    return "referal not fount";
                }
            } else {
                return $checkout->toArray();
            }
        }
    }

    public function reasonUpdate(Request $request)
    {
        $res = Checkout::query()
            ->where("id", $request->checkout_id)
            ->update([
                'reason_id' => (int)$request->reason_id,
                'status' => Checkout::IGNORE
            ]);
        if ($res) {
            return redirect()->back();
        }
    }

    public function checkoutSelling($id)
    {
        $res = Checkout::query()
            ->where("id", $id)
            ->update([
                'status' => Checkout::DELIVING,
                'reason_id' => 0
            ]);
        if ($res)
            return redirect()->back();
    }


    public function checkoutSellingApi($id)
    {
        $res = Checkout::query()
            ->where("id", $id)
            ->update([
                'status' => Checkout::DELIVING,
                'reason_id' => 0
            ]);
        if ($res)
            return TelegramBotHelper::sendTest(Checkout::query()->where('id', $id)->with(['product', 'with_status', 'referal', 'region'])->first());
    }


    public function checkoutAccepted($id)
    {
        $res = Checkout::query()
            ->where("id", $id)
            ->update([
                'status' => Checkout::NOT_SALED,
                'reason_id' => 0
            ]);
        if ($res) {

            TelegramBotHelper::sendTest(Checkout::query()->where('id', $id)->with(['product', 'with_status', 'referal', 'region'])->first());
            return redirect()->back();
        }
    }


    public function storeRequest(Request $request)
    {
        $request->validate([
            'checkout_id' => ['required'],
            'description' => ['required']
        ]);

        $req = new \App\Models\Request();
        $req->admin_id = auth()->user()->getAuthIdentifier();
        $req->checkout_id = (int)$request->checkout_id;
        $req->description = $request->description;
        if ($req->save()) {
            $res = Checkout::query()
                ->where("id", $request->checkout_id)
                ->update([
                    'status' => Checkout::NOT_SALED,
                    'reason_id' => 0
                ]);
            if ($res) {
                TelegramBotHelper::sendTest(Checkout::query()->where('id', $request->checkout_id)->with(['product', 'with_status', 'referal', 'region'])->first());
                return redirect()->back();
            }
        }
    }

    public function checkoutAcceptedApi($id)
    {
        $res = Checkout::query()
            ->where("id", $id)
            ->update([
                'status' => Checkout::NOT_SALED,
                'reason_id' => 0
            ]);
        if ($res)
            TelegramBotHelper::sendTest(Checkout::query()->where('id', $id)->with(['product', 'with_status', 'referal', 'region'])->first());
    }

}
