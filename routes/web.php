<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentMarkController;
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
       return redirect()->to('/login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [StudentController::class, 'index'])->name('home');
    Route::post('/student/save', [StudentController::class, 'create'])->name('student.save');
    Route::post('/student/{id}/update', [StudentController::class, 'update'])->name('student.update');
    Route::get('/student/{id}/delete',[StudentController::class, 'delete'])->name('student.delete');
    Route::get('/marks', [StudentMarkController::class, 'index'])->name('marks');
    Route::post('/mark/save',[StudentMarkController::class, 'save'])->name('marks.save');
    Route::post('/studentTerm/{id}/update',[StudentMarkController::class, 'update'])->name('marks.update');
    Route::get('/studentTerm/{id}/delete',[StudentMarkController::class, 'delete'])->name('marks.delete');

});


require __DIR__.'/auth.php';

