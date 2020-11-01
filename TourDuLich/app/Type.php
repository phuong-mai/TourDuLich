<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "tour_type";
    protected $fillable = ['id', 'name','description'];
}
