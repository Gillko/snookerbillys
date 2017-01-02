<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 */
class Address extends Model
{
	protected $table = 'addresses';

	protected $primaryKey = 'address_id';

	public $timestamps = false;

	protected $fillable = [
		'address_id',
		'addres_country',
		'address_city',
		'address_postalcode',
		'address_street',
		'address_number',
		'address_latitude',
		'address_longitude'
	];

	protected $guarded = [];

	public function team()
	{
		//return $this->belongsTo('App\Models\Team', 'team_id', 'team_id');
		return $this->belongsTo('App\Models\Team');
	}
}