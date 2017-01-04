<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Frame
 */
class Frame extends Model
{
    protected $table = 'frames';

    protected $primaryKey = 'frame_id';

    public $timestamps = false;

    protected $fillable = [
        'frame_id',
        'frame_name',
        'frame_scorePlayerHome',
        'frame_breakPlayerHome',
        'frame_scorePlayerAway',
        'frame_breakPlayerAway',
    ];

    protected $guarded = [];

    public function matches()
    {
        return $this->belongsToMany('App\Models\Match', 'matches_frames', 'match_id', 'frame_id');
    }

    /**
    *Get a list of tag ids associated with the current tutorial.
    *
    *@return array
    */
    public function getMatchListAttribute()
    {
        return $this->matches->pluck('match_id')->all();
    }
}