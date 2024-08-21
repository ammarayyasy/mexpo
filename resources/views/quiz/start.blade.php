@extends('layouts.main')

@section('main')
<form action="{{ route('quiz.submit', ['id' => $quiz_id]) }}" method="POST" id="quizForm">
    @csrf

    <!-- Hidden input to store start time -->
    <input type="hidden" name="start_time" id="start_time" value="{{ now() }}">

    <!-- Hidden input to store duration -->
    <input type="hidden" name="duration" id="duration" value="">

    <!-- Timer display -->
    <div class="d-flex justify-content-center mt-5">
        <div class="col-md-3">
            <div id="timer" class="mb-3" style="font-size: 24px; font-weight: bold;">
                Timer: <span id="time"></span>
            </div>

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

<script>
    const timeLimit = {{ $quiz->time_limit }} * 60; // convert to seconds
    let timeRemaining = timeLimit;

    const timerElement = document.getElementById('time');
    const durationInput = document.getElementById('duration');
    const quizForm = document.getElementById('quizForm');

    const startTime = new Date(); // Start time when the quiz page is loaded

    function updateTimer() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;

        timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

        if (timeRemaining > 0) {
            timeRemaining--;
        } else {
            clearInterval(timerInterval);
            alert('Waktu habis! Quiz akan otomatis dikirim.');

            // Calculate duration before submitting
            const endTime = new Date();
            const duration = Math.floor((endTime - startTime) / 1000); // in seconds
            durationInput.value = duration;

            quizForm.submit(); // Auto-submit ketika waktu habis
        }
    }

    updateTimer();
    const timerInterval = setInterval(updateTimer, 1000);

    // Before submitting, calculate and set the duration
    quizForm.addEventListener('submit', function () {
        const endTime = new Date();
        const duration = Math.floor((endTime - startTime) / 1000); // in seconds
        durationInput.value = duration;
    });
</script>
@endsection