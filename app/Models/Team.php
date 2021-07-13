<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    const NOT_JOINED = 0;
    const JOINED = 1;

    public function user(){
        return $this->belongsTo(User::class);
    }

}
