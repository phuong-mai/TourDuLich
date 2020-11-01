<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = "tour_price";
    protected $fillable = ['id', 'price','id_tour', 'star_day', 'end_day'];
}
