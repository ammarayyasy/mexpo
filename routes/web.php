<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [IndexController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/quiz/landing/{quiz_id}', [QuizController::class, 'index']);
Route::get('/quiz/start/{quiz_id}', [QuizController::class, 'start']);
Route::post('/quiz/submit/{id}', [QuizController::class, 'submit'])->name('quiz.submit');

Route::name('dashboard.')->prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    
    Route::resource('user', UserController::class);
    
    Route::get('/quiz-1', [ReviewController::class, 'quiz1']);
    Route::get('review1/{id}', [ReviewController::class, 'show1']);
    Route::delete('review1/{id}', [ReviewController::class, 'destroy1']);

    Route::get('/quiz-2', [ReviewController::class, 'quiz2']);
    Route::get('review2/{id}', [ReviewController::class, 'show2']);
    Route::delete('review2/{id}', [ReviewController::class, 'destroy2']);

});
