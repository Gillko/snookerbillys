<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Team
 */
class Team extends Model
{
    protected $table = 'teams';

    protected $primaryKey = 'team_id';

    public $timestamps = false;

    protected $fillable = [
        'team_id',
        'team_name',
        'address_id'
    ];

    protected $guarded = [];

    public function address()
    {
        //return $this->hasOne('App\Models\Address', 'address_id', 'address_id');
        return $this->hasOne('App\Models\Address');
    }

    public function ranking()
    {
        return $this->belongsTo('App\Models\Ranking', 'ranking_id', 'ranking_id');
    }

    public function players()
    {
    	return $this->hasMany('App\Models\Player', 'player_id', 'player_id');
    }

    /**
    *Get the weeks associated with the given team.
    *
    *@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function weeks()
    {
        return $this->belongsToMany('App\Models\Week', 'teams_weeks');
    }
}