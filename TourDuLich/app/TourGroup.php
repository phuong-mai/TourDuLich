<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourGroup extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tour_group';
    protected $fillable = [
        'id', 'tour_id', 'name','from_date','to_date','plan'
    ];
}
