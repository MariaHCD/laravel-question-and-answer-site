@extends('base')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-5 text-center">{{$question->title}}</h2>
            <p>{{$question->description}}</p>

            @if ($question->answers->count() === 0)
            <div class="card mt-4 mb-4 text-center">
                <div class="card-body">
                    No answers yet :( Be the first to answer this question!
                </div>
            </div>
        </div>
        @endif

        <div class="col-sm-12 p-0">
            @foreach($question->answers as $answer)
            <div class="card mt-2 mb-2">
                <div class="card-body">
                    <p class="card-text">{{$answer->answer}}</p>
                </div>
                <div class="card-footer">
                    <div class="row text-right">
                        <div class="col-sm-12">
                            Posted on: {{$answer->created_at}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-sm-12 border p-4 text-center">
            <h5>Submit your Answer for this Question:</h5>
            <form action="" autocomplete="off" class="form-horizontal" method="post" accept-charset="utf-8">
                <textarea name="searchtext" value="" class="form-control" placeholder="Your answer here..."></textarea>
                <div class="mt-2">
                    <button type="button" class="btn btn-primary mb-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
