<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = "participant";
    protected $fillable = ['participant_id', 'group_id','participant_staff', 'customer_number'];
    protected $primaryKey = 'participant_id';
}
