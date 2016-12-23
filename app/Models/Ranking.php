<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ranking
 */
class Ranking extends Model
{
    protected $table = 'rankings';

    protected $primaryKey = 'ranking_id';

    public $timestamps = false;

    protected $fillable = [
        'ranking_id',
        'ranking_rank',
        'ranking_playedMatches',
        'ranking_wonMatches',
        'ranking_drawMatches',
        'ranking_lostMatches',
        'ranking_lostFrames',
        'ranking_wonFrames',
        'week_id',
        'season_id',
        'team_id'
    ];

    protected $guarded = [];

    public function week()
    {
        return $this->hasOne('App\Models\Week', 'week_id', 'week_id');
        //return $this->hasOne('App\Models\Week');
    }

    public function team()
    {
        return $this->hasOne('App\Models\Team', 'team_id', 'team_id');
        //return $this->hasOne('App\Models\Team');
    }

    public function season()
    {
        /*return $this->hasOne('App\Models\Season', 'season_id', 'season_id');*/
        return $this->hasOne('App\Models\Season');
    }
}