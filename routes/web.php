<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionaireController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PurposeController;
use App\Http\Controllers\CompletionController;
use App\Http\Controllers\ProjectsController;

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

Route::get('/', [QuizController::class, 'index']);

Route::get('/quiz', [QuizController::class, 'index']);
Route::get('/quiz/{id}', [QuizController::class, 'show']);
Route::get('/quiz/{id}/info', [QuizController::class, 'show']);
Route::get('/quiz/{id}/budget', [QuizController::class, 'show']);
Route::get('/quiz/{id}/purpose', [QuizController::class, 'show']);
Route::get('/quiz/{id}/areas', [QuizController::class, 'show']);
Route::get('/quiz/{id}/completion', [QuizController::class, 'show']);
Route::get('/quiz/{id}/result', [QuizController::class, 'result']);

Route::get('/admin/project/create', [ProjectsController::class, 'create']);
Route::post('/project/store', [ProjectsController::class, 'store']);
Route::get('/project/edit/{id}', [ProjectsController::class, 'edit']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/create', [AdminController::class, 'create']);
Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
Route::post('/admin/store', [AdminController::class, 'store']);


Route::get('/admin/{setting}', [AdminController::class, 'setting']);
Route::get('/admin/{setting}/delete/{id}', [AdminController::class, 'delete']);
Route::post('/admin/{setting}/store', [AdminController::class, 'createOptions']);
Route::post('/admin/{setting}/resultStore', [AdminController::class, 'storeResultOption']);

Route::post('/sendmail',[ResultController::class, 'sendMail']);

Route::get('generate-pdf', [ResultController::class, 'pdfview'])->name('generate-pdf');

Route::get('delete', [ResultController::class, 'delete'])->name('delete-area');



