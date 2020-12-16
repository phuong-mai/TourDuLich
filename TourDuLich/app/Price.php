<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
	protected $table = 'price';
	protected $primaryKey = 'price_id';
	protected $fillable = [
		'price_id', 'price_value','tour_id', 'price_start_date','price_end_date',
	];
}
