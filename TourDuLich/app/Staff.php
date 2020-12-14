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
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $message = [];
    public $rules = [
        'staff_name' => 'required',
        'staff_phone_number' => 'required|digits:10',
        'staff_email' => 'required|email',
        'staff_id_card' => 'required',
    ];
    protected $table = "staff";
    
    protected $primaryKey = 'staff_id';
    protected $fillable = ['staff_id', 'staff_name','staff_email','staff_id_card', 'staff_address', 'staff_phone_number', 'staff_birthday', 'staff_responsibility'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'staff_name.required' => 'Vui lòng nhập tên nhân viên! ',
            'staff_email.required' => 'Vui lòng nhập email! ',
            'staff_email.email' => 'Dữ liệu nhập phải là địa chỉ Email! ',
            'staff_phone_number.required' => 'Vui lòng nhập số điện thoại! ',
            'staff_phone_number.digits' => 'Vui lòng nhập đúng số điện thoại! ',
            'staff_id_card.required' => 'Vui lòng nhập số căn cước hoặc CMND',
        ];
    }
}
