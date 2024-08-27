<?php


use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RubricController;


route::resource('rubrics', RubricController::class);
Route::resource('questions', QuestionController::class);
Route::post('questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store');
Route::delete('answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');





