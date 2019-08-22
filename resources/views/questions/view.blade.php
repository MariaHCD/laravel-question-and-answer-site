@extends('base')

@section('main')
<div class="container">
    <div class="row mb-4">
        <div class="col-sm-10 offset-sm-1 p-0">
            <h3 class="mt-2 text-center">{{$question->question}}</h3>
            @if(session()->get('success'))
            <div class="alert alert-success mb-0">
                {{ session()->get('success') }}
            </div>
            @endif
            @if ($question->answers->count() === 0)
            <div class="card mt-4 mb-2 text-center">
                <div class="card-body">
                    No answers yet :( Be the first to answer this question!
                </div>
            </div>
            @endif
        </div>

        <div class="col-sm-10 offset-sm-1 p-0">
            @foreach($question->answers as $answer)
            <div class="card mt-4 mb-2">
                <div class="card-body">
                    <p class="card-text">{{$answer->answer}}</p>
                </div>
                <div class="card-footer pt-1 pb-1">
                    <div class="row text-right">
                        <div class="col-sm-12">
                            Posted on: {{$answer->created_at}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-sm-10 offset-sm-1 border p-4">
            <div class="text-center">
                <h5>Submit your Answer for this Question:</h5>
                <form action="{{ route('answer', ['question' => $question->id]) }}" autocomplete="off"
                    class="form-horizontal" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="answer" class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}"
                            placeholder="Your answer here...">{{ old('answer') }}</textarea>
                        @if ($errors->has('answer'))
                        <span class="text-danger">{{ $errors->first('answer') }}</span>
                        @endif
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
