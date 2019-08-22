@extends('base')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <form action="{{ route('questions.store') }}" autocomplete="off" class="form-horizontal" method="post"
                accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="input-group">
                    <input name="question" value="{{ old('question') }}"
                        class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="text">
                    <button type="submit" class="btn btn-primary mb-2">Post Question</button>
                </div>
                <div class="text-center">
                    @if ($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                    @endif
                    @if(session()->get('success'))
                    <div class="text-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            @foreach($questions as $question)
            <div class="card mt-4 mb-4">
                <div class="card-body">
                    <h4 class="card-title m-0"><a
                            href="{{url('/questions/'.$question->id)}}">{{$question->question}}</a></h4>
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
