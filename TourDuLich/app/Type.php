<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "type";
    protected $fillable = ['type_id', 'type_name','type_description'];
}
