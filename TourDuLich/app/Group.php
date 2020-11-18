<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'group';
    protected $fillable = [
        'group_id', 'tour_id', 'group_name','group_start_date','group_end_date','group_plan'
    ];
    protected $primaryKey = 'group_id';
}
