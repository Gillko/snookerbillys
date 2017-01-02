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
        'week_start',
        'week_day',
        'week_date',
        'week_scoreTeamHome',
        'week_scoreTeamAway',
        'season_id',
        'location_id'
    ];

    protected $guarded = [];

    public function season()
    {
        //return $this->belongsTo('App\Models\Season', 'season_id', 'season_id');
        return $this->belongsTo('App\Models\Season', 'season_id');
    }

    public function location()
    {
        //return $this->belongsTo('App\Models\Season', 'season_id', 'season_id');
        return $this->hasOne('App\Models\Location', 'location_id');
    }

    /**
    *Get the tags associated with the given tutorial.
    *
    *@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'teams_weeks', 'week_id', 'team_id');
    }

    public function matches()
    {
        return $this->hasMany('App\Models\Match', 'season_id', 'match_id');
    }

    /**
    *Get a list of tag ids associated with the current tutorial.
    *
    *@return array
    */
    public function getTeamListAttribute()
    {
        return $this->teams->pluck('team_id')->all();
    }
}