<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table = "tour_cost";
    protected $fillable = ['id', 'group_id','cost_total', 'description'];
}
