<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = "tours";
    protected $fillable = ['id', 'tour_name','description', 'id_type', 'id_price'];
}
