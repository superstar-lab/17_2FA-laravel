<?php

namespace App\Models;

use App\CardCategory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];

    public function CardCategory()
    {
        return $this->belongsTo(CardCategory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
