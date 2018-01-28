<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name', 'description', 'series', 'replays', 'muscle_group_id'
    ];

    public function muscleGroup()
    {
        return $this->belongsTo(MuscleGroup::class);
    }
}
