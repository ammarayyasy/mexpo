<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole('user 1')) {
                $quiz = Quiz::find(1);
            } else {
                $quiz = Quiz::find(2);
            }
        } else {
            $quiz = null;
        }
        
        return view('index', compact('quiz'));
    }
    
}
