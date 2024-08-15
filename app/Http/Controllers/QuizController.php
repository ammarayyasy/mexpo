<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index($id) {
        $quiz = Quiz::find($id);
        return view('quiz.index', compact('quiz'));
    }

    public function start($id) {
        $questions = Question::where('quiz_id', $id)->with('choices')->get();
        $quiz_id = $id;
        
        return view('quiz.start', compact('questions', 'quiz_id'));
    }

    public function submit(Request $request, $id)
    {
        $user = Auth::user();
    
        // Mencatat percobaan baru di tabel user_quiz_attempts
        $attempt = UserQuizAttempt::create([
            'user_id' => $user->id,
            'quiz_id' => $id, 
            'attempted_at' => now(),
        ]);
    
        $score = 0;
    
        // Mengambil semua pertanyaan terkait kuis ini
        $questions = Question::where('quiz_id', $id)->get();
    
        foreach ($questions as $question) {
            $submittedAnswerId = $request->input('question_' . $question->id);
            $correctAnswer = $question->choices()->where('is_correct', true)->first();
    
            if ($submittedAnswerId == $correctAnswer->id) {
                $score += $question->weight; // Tambahkan bobot ke skor
            }
    
            // Simpan jawaban pengguna ke database
            Answer::create([
                'user_id' => $user->id,
                'quiz_id' => $id, 
                'question_id' => $question->id,
                'choice_id' => $submittedAnswerId,
                'user_quiz_attempt_id' => $attempt->id, 
            ]);
        }
    
        // Simpan hasil kuis ke database
        Result::create([
            'user_id' => $user->id,
            'quiz_id' => $id, 
            'score' => $score,
            'user_quiz_attempt_id' => $attempt->id, 
        ]);
    
        return redirect('/')->with('success', 'Quiz submitted successfully! Your score is ' . $score);
    }       
}
