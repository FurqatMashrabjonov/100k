<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    const VIEWED = 1;
    const NOT_VIEWED = 0;

    public function info(){
        return $this->belongsTo(Info::class);
    }

}
