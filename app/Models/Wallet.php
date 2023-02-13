<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $guarded = [];

    public function wallet(){
        return $this->belongsTo(User::class);
    }
}
