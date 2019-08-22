@extends('base')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('questions.store') }}" autocomplete="off" class="form-horizontal" method="post"
                accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="input-group">
                    <input name="question" value="{{ old('question') }}" class="form-control" type="text">
                    <button type="submit" class="btn btn-primary mb-2">Post Question</button>
                </div>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @foreach($questions as $question)
            <div class="card mt-2 mb-2">
                <div class="card-body">
                    <h4 class="card-title m-0"><a href="{{url('/questions/'.$question->id)}}">{{$question->question}}</a></h4>
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
