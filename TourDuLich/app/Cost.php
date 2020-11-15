<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table = "cost";
    protected $primaryKey = 'cost_id';
    protected $fillable = ['cost_id', 'group_id','cost_hotel','cost_food','cost_vehicle','cost_another','cost_total', 'cost_detail'];
}
