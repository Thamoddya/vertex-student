<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/team-login',[\App\Http\Controllers\AuthController::class , 'login'])->name('team.login');

Route::middleware('auth:sanctum')->group(function ( ) {
    Route::get('/',[\App\Http\Controllers\StudentController::class,'showAllStudents'])->name("home");
    Route::post('/add-date',[\App\Http\Controllers\DateController::class,'addDate'])->name('addDate');
    Route::post('/add-event',[\App\Http\Controllers\EventController::class,'addEvent'])->name('addEvent');
    Route::post('/add-student',[\App\Http\Controllers\StudentController::class,'addStudent'])->name('addStudent');
    Route::get('/add-attendance',[\App\Http\Controllers\StudentHasAttendanceController::class,'addAttendance'])->name('addAttendance');
    Route::get('/getStudentsByEvent/{eventId}', [\App\Http\Controllers\StudentController::class,'getStudentsByEvent']);
});

Route::get('login',function (){
    return view('login');
})->name('login');


