<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Http\Requests\StoreAnswer;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswer $request, Question $question)
    {
        $answer = new Answer($request->validated());

        $question->answers()->save($answer);

        return redirect('/questions/' . $answer->question->id)->with('success', __('messages.answer.created'));
    }
}
