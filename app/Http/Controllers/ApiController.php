<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function checkouts($status){
        $checkouts = Checkout::query()->where("status", $status)->with(['product', 'with_status', 'referal', 'region'])->orderBy('created_at', 'desc')->get();
        return successResponse($checkouts);
    }
}
