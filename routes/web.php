<?php

use Illuminate\Support\Facades\Route;

Route::post('/team-login',[\App\Http\Controllers\AuthController::class , 'login'])->name('team.login');

Route::middleware('auth:sanctum')->group(function ( ) {
    Route::get('/',[\App\Http\Controllers\StudentController::class,'showAllStudents'])->name("home");
    Route::post('/add-date',[\App\Http\Controllers\DateController::class,'addDate'])->name('addDate');
    Route::post('/add-event',[\App\Http\Controllers\EventController::class,'addEvent'])->name('addEvent');
    Route::post('/add-student',[\App\Http\Controllers\StudentController::class,'addStudent'])->name('addStudent');
    Route::get('/add-attendance',[\App\Http\Controllers\StudentHasAttendanceController::class,'addAttendance'])->name('addAttendance');
    Route::get('/getStudentsByEvent/{eventId}', [\App\Http\Controllers\StudentController::class,'getStudentsByEvent']);
    Route::post('/add-team-member', [\App\Http\Controllers\Controller::class,'addTeamMember'])->name('add-team-member');

});
Route::post('/send-team-email', [\App\Http\Controllers\Controller::class,'sendUserEmail'])->name('send-team-email');
Route::get('login',function (){
    return view('login');
})->name('login');
