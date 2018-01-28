<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{
    protected $fillable = ['name'];

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public static function findById($id)
    {
        return static::where(compact('id'))->first();
    }
}
