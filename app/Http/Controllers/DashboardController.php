<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {        
        return view('dashboard.index');
    }

    public function review($quiz_id)
    {
        $quiz = Quiz::with('questions.choices')->findOrFail($quiz_id);
    
        // Mengambil semua percobaan untuk kuis ini
        $attempts = UserQuizAttempt::where('quiz_id', $quiz_id)
            ->with(['user', 'answers.question', 'answers.choice'])
            ->get();
    
        return view('review ', compact('quiz', 'attempts'));
    }
    

}
