<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestion;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('answers')->orderBy('created_at', 'desc')->get();

        return view('questions.index', compact('questions'))->with('placeholder', $this->getRandomQuestion());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion $request)
    {
        $question = new Question($request->validated());

        $question->save();

        return redirect('/questions')->with('success', __('messages.question.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.view', ['question' => $question]);
    }

    /**
     * Retrieve a random question to display as a placeholder
     */
    private function getRandomQuestion(): string
    {
        $jsonString = file_get_contents(base_path('resources/lang/en/questions.json'));

        $data = json_decode($jsonString, true);

        $index = array_rand($data);

        return $data[$index];
    }
}
