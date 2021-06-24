<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Referal;
use App\Models\User;


class CheckoutController
{
    public function index()
    {
        $checkouts = Checkout::query()->orderBy("status", 'asc')->with(['product', 'with_status', 'region'])->get();
        return view("admin.checkout", compact("checkouts"));
    }

    public function checkoutSaled($id)
    {
        $res = Checkout::query()
            ->where("id", $id)
            ->update([
                'status' => Checkout::SALED
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
                    $balance = (((int)$checkout->product->price * User::PERCENT) / 100) * (int)$checkout->count;
                    if ($balance != null)
                        $res = User::query()
                            ->where("id", $referal->user_id)
                            ->increment("balance", $balance);
                    if ($res)
                        return redirect(url("admin/checkouts"));

                }else {
                    return " referal not fount";
                }
            }else{
                return $checkout->toArray();
            }
        }
    }
}
