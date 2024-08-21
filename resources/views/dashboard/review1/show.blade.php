@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h2>Detail Attempt by {{ $attempt->user->name }}</h2>
    <p>Attempted at: {{ $attempt->attempted_at }}</p>
    <p>Score: {{ $attempt->results->score }}</p>

    <h3>Questions</h3>
    @foreach ($attempt->answers as $answer)
        <div class="card mb-3">
            <div class="card-header">
                {{ $answer->question->question }}
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($answer->question->choices as $choice)
                    <li class="list-group-item">
                        {{ $choice->choice_text }}
                        @if (is_null($answer->choice_id))
                            <span class="badge bg-secondary">Tidak Dijawab</span>
                        @elseif ($choice->id == $answer->choice_id)
                            <span class="badge bg-{{ $choice->is_correct ? 'success' : 'danger' }}">
                                {{ $choice->is_correct ? 'Correct' : 'Wrong' }}
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach

    <a href="/dashboard/quiz-1" class="btn btn-primary">Back to Review</a>
</div>

@endsection
