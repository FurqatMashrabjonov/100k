<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    const NOT_SALED = 1;
    const SALED = 2;
    const SENT = 3;

    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }
    public function getLikedAttribute()
    {
        if (auth()->check()) {
            $like = Like::query()
                ->where("user_id", auth()->user()->getAuthIdentifier())
                ->where('product_id', $this->id)
                ->first();
            if (!empty($like) and $like) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
