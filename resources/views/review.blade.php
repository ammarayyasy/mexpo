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
