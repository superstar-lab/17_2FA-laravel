<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function operator(){
        return $this->belongsTo(Operator::class);
    }
}
