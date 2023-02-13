<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $guarded = [];

    public function recharges(){
        return $this->hasMany(Recharge::class);
    }
}
