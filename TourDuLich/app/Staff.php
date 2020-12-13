<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $table = "staff";
    protected $fillable = ['staff_id', 'staff_name', 'staff_address', 'staff_phone_number', 'staff_birthday', 'staff_responsibility'];
}
