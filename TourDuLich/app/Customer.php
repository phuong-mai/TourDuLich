<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_id', 'customer_name','customer_email', 'customer_phone_number','customer_id_card', 'customer_birthday'];
}
