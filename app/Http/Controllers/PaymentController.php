<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $payed = Payment::query()
            ->where("user_id", auth()->user()->getAuthIdentifier())
            ->where("status", Payment::PAYED)
            ->sum("amount");
        return view("profile.payment", compact('payed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'card_number' => ['required'],
            'amount' => ['required', 'numeric']
        ]);

        if (auth()->user()->balance < (int)$request->amount){
            return redirect()->back()->withErrors(['amount_error' => "Hisobingizda yetarli mablag' mavjud emas"]);
        }

        $payment = new Payment();
        $payment->user_id = auth()->user()->getAuthIdentifier();
        $payment->card_number = $request->card_number;
        $payment->amount = $request->amount;
        $payment->status = Payment::NOT_PAYED;

        if ($payment->save()){

            User::query()
                ->where("id", auth()->user()->getAuthIdentifier())
                ->decrement("balance", (int)$request->amount);

            session()->put("success", "So'rovingiz qabul qilindi.");
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
