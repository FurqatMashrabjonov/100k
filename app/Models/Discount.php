<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    const PERCENT = 1;
    const SUMM = 2;
    const REF_DISCOUNT = 10; //percent
}
