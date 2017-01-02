<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Match
 */
class Match extends Model
{
    protected $table = 'matches';

    protected $primaryKey = 'match_id';

    public $timestamps = false;

    protected $fillable = [
        'match_id',
        'match_scorePlayerHome',
        'match_scorePlayerAway',
        'week_id',
        'season_id',
        'location_id'
    ];

    protected $guarded = [];

    public function season()
    {
        //return $this->belongsTo('App\Models\Season', 'season_id', 'season_id');
        return $this->belongsTo('App\Models\Season', 'season_id');
    }

    public function week()
    {
        return $this->belongsTo('App\Models\Week', 'week_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    public function players()
    {
        return $this->belongsToMany('App\Models\Player', 'players_matches', 'match_id', 'player_id');
    }

    public function frames()
    {
        return $this->belongsToMany('App\Models\Frame', 'matches_frames', 'match_id', 'frame_id');
    }

    /**
    *Get a list of tag ids associated with the current tutorial.
    *
    *@return array
    */
    public function getPlayerListAttribute()
    {
        return $this->players->pluck('player_id')->all();
    }
}