<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const PAYED = 8;
    const NOT_PAYED=9;
    const ABORT = 10;

    public function status_one(){
        return $this->belongsTo(Status::class, 'status', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
