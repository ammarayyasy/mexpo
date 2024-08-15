@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Review Kuis 2</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success  col-lg-9" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive col-lg-9">
    @foreach ($attempts as $attempt)
        <h3>User: {{ $attempt->user->name }}</h3>
        <p>Attempted At: {{ $attempt->attempted_at }}</p>

        @foreach ($attempt->answers as $answer)
            <div class="card mb-5">
                <div class="card-header">
                    Question: {{ $answer->question->question }}
                </div>
                <div class="card-body">
                    <p>Selected Answer: {{ $answer->choice->choice_text }}</p>
                    <p>Correct Answer: 
                        @if($answer->choice->is_correct)
                            <span class="text-success">Correct</span>
                        @else
                            <span class="text-danger">Incorrect</span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach

        <hr>
    @endforeach

  </div>

@endsection