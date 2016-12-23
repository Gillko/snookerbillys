<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Week
 */
class Week extends Model
{
    protected $table = 'weeks';

     protected $primaryKey = 'week_id';

    public $timestamps = false;

    protected $fillable = [
        'week_id',
        'week_name',
        'season_id'
    ];

    protected $guarded = [];

    public function season()
    {
        //return $this->belongsTo('App\Models\Season', 'season_id', 'season_id');
        return $this->belongsTo('App\Models\Season', 'season_id');
    }
}