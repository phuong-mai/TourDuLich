<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = "participant";
    protected $fillable = ['participant_id', 'group_id','participant_staff', 'participant_customer'];
}
