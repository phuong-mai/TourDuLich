<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $message = [];
    public $rules = [
        'customer_name' => 'required',
        'customer_phone_number' => 'required|digits:10',
        'customer_email' => 'required|email',
        'customer_id_card' => 'required',
    ];
    protected $table = "customer";
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_id', 'customer_name','customer_email', 'customer_phone_number','customer_id_card', 'customer_birthday'];
    public function __construct()
    {
        parent::__construct();
        $this->message = [
            'customer_name.required' => 'Vui lòng nhập tên khách hàng! ',
            'customer_email.required' => 'Vui lòng nhập email! ',
            'customer_email.email' => 'Dữ liệu nhập phải là địa chỉ Email! ',
            'customer_phone_number.required' => 'Vui lòng nhập số điện thoại! ',
            'customer_phone_number.digits' => 'Vui lòng nhập đúng số điện thoại! ',
            'customer_id_card.required' => 'Vui lòng nhập số căn cước hoặc CMND',
        ];
    }
}
