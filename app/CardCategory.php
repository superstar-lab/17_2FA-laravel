<?php

namespace App;

use App\Models\Card;
use Illuminate\Database\Eloquent\Model;

class CardCategory extends Model
{
    protected $guarded = [];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
