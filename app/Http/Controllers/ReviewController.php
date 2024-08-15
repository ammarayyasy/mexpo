<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function quiz1()
    {
        $quiz = Quiz::with('questions.choices')->findOrFail(1);
    
        // Mengambil semua percobaan untuk kuis ini
        $attempts = UserQuizAttempt::where('quiz_id', 1)
            ->with(['user', 'answers.question', 'answers.choice'])
            ->get();
    
        return view('dashboard.review1.index ', compact('quiz', 'attempts'));
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
}
