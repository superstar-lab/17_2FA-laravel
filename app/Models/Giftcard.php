<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giftcard extends Model
{
    protected $guarded = [];

    public function cardorders(){
        return $this->hasMany(Cardorder::class);
    }
}
