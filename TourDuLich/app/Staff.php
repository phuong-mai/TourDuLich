<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    // public $message = [];
    // public $rules = [
    //     'staff_name' => 'required',
    //     'staff_phone_number' => 'required|digits:10',
    //     'staff_email' => 'required|email',
    //     'staff_id_card' => 'required',
    // ];
    // protected $table = "staff";
    
    protected $primaryKey = 'staff_id';
    protected $fillable = ['staff_id', 'staff_name','staff_email','staff_id_card','staff_phone_number', 'staff_birthday', 'staff_responsibility'];

}
