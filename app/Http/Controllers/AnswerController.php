<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\StoreAnswer;
use App\Question;
use Illuminate\Http\Request;

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
    }
}
