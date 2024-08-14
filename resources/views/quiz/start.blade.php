@extends('layouts.main');

@section('main')
<form action="{{ route('quiz.submit', ['id' => $quiz_id]) }}" method="POST">
    @csrf
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-3">
            @foreach ($questions as $question)
                <div class="card mb-5">
                    <div class="card-header">
                        {{ $question->question }}
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($question->choices as $choice)
                            <li class="list-group-item">
                                <input type="radio" name="question_{{ $question->id }}" value="{{ $choice->id }}">
                                {{ $choice->choice_text }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection