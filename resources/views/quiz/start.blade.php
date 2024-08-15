@extends('layouts.main')

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

{{-- <form action="{{ route('quiz.submit', ['id' => $quiz_id]) }}" method="POST">
    @csrf
    <div id="quizCarousel" class="carousel slide" data-bs-interval="false">
        <div class="carousel-inner">
            @foreach ($questions as $index => $question)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="d-flex justify-content-center mt-5">
                        <div class="col-md-6">
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="carousel-indicators bg-danger">
            @foreach ($questions as $index => $question)
                <button type="button" data-bs-target="#quizCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    <button class="btn btn-primary" type="button" data-bs-target="#quizCarousel" data-bs-slide="prev">Prev</button>
    <button class="btn btn-primary" type="button" data-bs-target="#quizCarousel" data-bs-slide="next">Next</button>
</form> --}}
@endsection