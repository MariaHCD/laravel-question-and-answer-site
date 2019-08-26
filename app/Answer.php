<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['answer', 'question_id'];

    /**
     * The question associated with this answer
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
