<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonWalk extends Model
{
    protected $table = "tour_personwalk";
    protected $fillable = ['id', 'group_id','list_staff', 'list_customer'];
}
