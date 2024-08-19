<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function quiz1()
    {
        $quiz = Quiz::with(['questions.choices', 'results'])->findOrFail(1);
    
        // Mengambil semua percobaan untuk kuis ini
        $attempts = UserQuizAttempt::where('quiz_id', 1)
            ->with(['user', 'answers.question', 'answers.choice'])
            ->get();
    
        return view('dashboard.review1.index ', compact('quiz', 'attempts'));
    }

    public function show1($id)
    {
        $attempt = UserQuizAttempt::with(['user', 'answers.question', 'answers.choice'])
            ->findOrFail($id);

        // return dd($attempt);
        
        return view('dashboard.review1.show', compact('attempt'));
    }

    public function destroy1($id)
    {
        $attempt = UserQuizAttempt::findOrFail($id);

        Answer::where('user_quiz_attempt_id', $attempt->id)->delete();

        $attempt->delete();

        return redirect('/dashboard/quiz-1')->with('success', 'Hasil berhasil dihapus!');
    }



    public function quiz2()
    {
        $quiz = Quiz::with('questions.choices')->findOrFail(2);
    
        // Mengambil semua percobaan untuk kuis ini
        $attempts = UserQuizAttempt::where('quiz_id', 2)
            ->with(['user', 'answers.question', 'answers.choice'])
            ->get();
    
        return view('dashboard.review2.index ', compact('quiz', 'attempts'));
    }

    public function show2($id)
    {
        $attempt = UserQuizAttempt::with(['user', 'answers.question', 'answers.choice'])
            ->findOrFail($id);

        // return dd($attempt);
        
        return view('dashboard.review2.show', compact('attempt'));
    }

    public function destroy2($id)
    {
        $attempt = UserQuizAttempt::findOrFail($id);

        Answer::where('user_quiz_attempt_id', $attempt->id)->delete();

        $attempt->delete();

        return redirect('/dashboard/quiz-2')->with('success', 'Hasil berhasil dihapus!');
    }
}
