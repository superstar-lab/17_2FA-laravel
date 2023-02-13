<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Btcsell extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
