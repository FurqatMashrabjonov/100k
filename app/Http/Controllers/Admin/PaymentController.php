<?php


namespace App\Http\Controllers\Admin;


use App\Models\Info;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\User;

class PaymentController
{
    public function index()
    {
        $payments = Payment::query()->with(['status_one', 'user'])->get();
        return view("admin.payments", compact("payments"));
    }


    public function abort_method($id)
    {
        $res = Payment::query()
            ->where("id", $id)
            ->update([
                'status' => Payment::ABORT
            ]);

        $payment = Payment::find($id);
        User::query()->where("id", $payment->user_id)
            ->increment('balance', (int)$payment->amount);

        if ($res)
            return redirect()->back();
    }

    public function payed_method($id)
    {
        $payment = Payment::find($id);
        $res = Payment::query()
            ->where("id", $id)
            ->update([
                'status' => Payment::PAYED
            ]);
        if ($res) {
            $info = Info::query()->where("key", "balance_withdrawed")->first();
            Notification::query()->insert([
                'user_id' => $payment->user_id,
                'info_id' => $info->id,
                'status' => Notification::NOT_VIEWED
            ]);
            return redirect()->back();
        }
    }
}
