<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Season
 */
class Season extends Model
{
    protected $table = 'seasons';

    protected $primaryKey = 'season_id';

	public $timestamps = false;

    protected $fillable = [
        'season_years',
        'season_start',
        'season_end'
    ];

    protected $guarded = [];

    public function weeks()
    {
        //return $this->hasMany('App\Models\Week', 'week_id', 'week_id');
        return $this->hasMany('App\Models\Week', 'season_id', 'week_id');
    }
}