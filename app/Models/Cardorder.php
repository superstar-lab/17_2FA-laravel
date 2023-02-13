<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cardorder extends Model
{
    protected $guarded = [];

    public function giftcard(){
        return $this->belongsTo(Giftcard::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
