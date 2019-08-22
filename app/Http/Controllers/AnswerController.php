<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Http\Requests\StoreAnswer;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return $question->answers()->orderBy('created_at', 'desc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswer $request)
    {
        $answer = new Answer($request->validated());

        $answer->save();

        return redirect('/question/' . $answer->question->id)->with('success', __('answer.created'));
    }
}
