<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourPrice extends Model
{
    protected $table = 'price';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'price_id', 'price_value','tour_id', 'price_start_date','price_end_date',
	];
}
