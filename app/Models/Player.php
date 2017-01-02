<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 */
class Player extends Model
{
    protected $table = 'players';

    protected $primaryKey = 'player_id';

    public $timestamps = false;

    protected $fillable = [
        'player_id',
        'player_firstname',
        'player_surname',
        'player_nickname',
        'player_highestBreakTraining',
        'player_highestBreakOfficial',
        'player_cue',
        'team_id'
    ];

    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo('App\Models\Team', 'team_id', 'team_id');
    }

    public function matches()
    {
        return $this->belongsToMany('App\Models\Match', 'players_matches');
    }
}