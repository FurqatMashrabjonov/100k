<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public function getAdminAttribute(){
        $admin = User::find($this->admin_id);
        return $admin;
    }

    public function getCheckoutAttribute(){
        $checkout = Checkout::find($this->checkout_id);
        return $checkout;
    }

}
