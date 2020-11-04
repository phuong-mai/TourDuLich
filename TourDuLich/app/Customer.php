<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['id', 'name','email', 'address', 'phone_number','id_card', 'birthday'];
}
