<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware'=>'auth'],function()
{
    route::get('panel',[MainController::class, 'dashboard'])->name('dashboard');
    route::get('quiz/detay/{slug}',[MainController::class,'quiz_detail'])->name('quiz.detail');
    route::get('quiz/{slug}',[MainController::class,'quiz'])->name('quiz.join');
    route::post('quiz/{slug}/result',[MainController::class,'result'])->name('quiz.result');
});


Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'],function()
{
    route::get('quizzes/{id}',[QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
    route::get('quiz/{quiz_id}/questions/{id}',[QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('quizzes',QuizController::class);
    Route::resource('quiz/{quiz_id}/questions',QuestionController::class);
  
});




