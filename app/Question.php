<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

    /**
     * The answers related to this question
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
