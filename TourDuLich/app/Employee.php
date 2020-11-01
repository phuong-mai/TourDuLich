<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable = ['id', 'name','email', 'address', 'phone_number', 'birthday'];
}
