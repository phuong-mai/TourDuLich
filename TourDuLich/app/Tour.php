<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = "tour";
    protected $fillable = ['tour_id', 'tour_name','tour_description', 'type_id', 'price_id'];
}
