<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 */
class Location extends Model
{
	protected $table = 'locations';

	protected $primaryKey = 'location_id';

	public $timestamps = false;

	protected $fillable = [
		'location_id',
		'location_name',
	];

	protected $guarded = [];

	public function week()
	{
		return $this->belongsTo('App\Models\Week');
	}

	public function match()
	{
		return $this->belongsTo('App\Models\Match');
	}
}