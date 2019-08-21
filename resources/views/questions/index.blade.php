@extends('base')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-5 text-center">Ask a Question</h2>
            <form action="" autocomplete="off" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="input-group">
                    <input name="searchtext" value="" class="form-control" type="text">
                    <button type="button" class="btn btn-primary mb-2">Post Question</button>
                </div>
            </form>

            @foreach($questions as $question)
            <div class="card mt-2 mb-2">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{url('/'.$question->id)}}">{{$question->title}}</a></h4>
                    <p class="card-text">{{$question->description}}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            Posted on: {{$question->created_at}}
                        </div>

                        <div class="col-sm-6 text-right">
                            @if ($question->answers->count() === 0)
                            <span class="badge badge-warning">Be the first to answer this question!</span>
                            @endif

                            @if ($question->answers->count() > 0)
                            <span class="badge badge-success">
                                {{$question->answers->count()}} Answers
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @endsection
