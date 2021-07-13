<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    const NOT_SALED = 4;
    const SALED = 5;
    const DELIVING = 6;
    const IGNORE = 7;
    const NOT_ACCEPTED = 11;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function with_status()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function referal()
    {
        return $this->belongsTo(Referal::class);
    }

    public function get_requests(){
        return $this->hasMany(Request::class);
    }

    public function reason(){
        return $this->belongsTo(Reason::class);
    }
}
