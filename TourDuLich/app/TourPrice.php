<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourPrice extends Model
{
    protected $table = 'tour_price';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id', 'price','id_tour', 'start_day','end_day',
	];
}
