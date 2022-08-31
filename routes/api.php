<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/parent', [ParentController::class, 'index']);
Route::post('/parent', [ParentController::class, 'store']);
Route::put('/parent/{id}', [ParentController::class, 'update']);
Route::delete('/parent/{id}', [ParentController::class, 'destroy']);

Route::get('/student', [StudentController::class, 'index']);
Route::post('/student', [StudentController::class, 'store']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::delete('/student/{id}', [StudentController::class, 'destroy']);

Route::get('/teacher', [TeacherController::class, 'index']);
Route::post('/teacher', [TeacherController::class, 'store']);
Route::put('/teacher/{id}', [TeacherController::class, 'update']);
Route::delete('/teacher/{id}', [TeacherController::class, 'destroy']);

Route::get('/course', [CourseController::class, 'index']);
Route::post('/course', [CourseController::class, 'store']);
Route::put('/course/{id}', [CourseController::class, 'update']);
Route::delete('/course/{id}', [CourseController::class, 'destroy']);

Route::get('/grade', [GradeController::class, 'index']);
Route::post('/grade', [GradeController::class, 'store']);
Route::put('/grade/{id}', [GradeController::class, 'update']);
Route::delete('/grade/{id}', [GradeController::class, 'destroy']);

Route::get('/classroom', [ClassroomController::class, 'index']);
Route::post('/classroom', [ClassroomController::class, 'store']);
Route::put('/classroom/{id}', [ClassroomController::class, 'update']);
Route::delete('/classroom/{id}', [ClassroomController::class, 'destroy']);

Route::get('/attendance', [AttendanceController::class, 'index']);
Route::post('/attendance', [AttendanceController::class, 'store']);
Route::put('/attendance/{id}', [AttendanceController::class, 'update']);
Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);

Route::get('/exam', [ExamController::class, 'index']);
Route::post('/exam', [ExamController::class, 'store']);
Route::put('/exam/{id}', [ExamController::class, 'update']);
Route::delete('/exam/{id}', [ExamController::class, 'destroy']);

Route::get('/examType', [ExamTypeController::class, 'index']);
Route::post('/examType', [ExamTypeController::class, 'store']);
Route::put('/examType/{id}', [ExamTypeController::class, 'update']);
Route::delete('/examType/{id}', [ExamTypeController::class, 'destroy']);

Route::get('/examResult', [ExamResultController::class, 'index']);
Route::post('/examResult', [ExamResultController::class, 'store']);
Route::put('/examResult/{id}', [ExamResultController::class, 'update']);
Route::delete('/examResult/{id}', [ExamResultController::class, 'destroy']);

Route::get('/classroomStudent', [ClassroomStudentController::class, 'index']);
Route::post('/classroomStudent', [ClassroomStudentController::class, 'store']);
Route::put('/classroomStudent/{id}', [ClassroomStudentController::class, 'update']);
Route::delete('/classroomStudent/{id}', [ClassroomStudentController::class, 'destroy']);
