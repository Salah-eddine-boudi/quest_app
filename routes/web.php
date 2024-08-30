<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes for rubrics, questions, and answers
Route::middleware('auth')->group(function () {
    Route::resource('rubrics', RubricController::class);
    Route::resource('questions', QuestionController::class);

    Route::post('questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
    Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');
    Route::get('questions/{question}/answers/create', [AnswerController::class, 'create'])->name('answers.create');
    Route::get('answers', [AnswerController::class, 'index'])->name('answers.index');
    Route::get('answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
    Route::put('answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');
    Route::get('answers/{answer}', [AnswerController::class, 'show'])->name('answers.show');
});

// Authentication Routes
Route::get('login', [LoginController::class, 'showing'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
