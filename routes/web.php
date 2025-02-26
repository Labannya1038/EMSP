<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

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

Route::resource('employees', EmployeeController::class);
Route::resource('attendance', AttendanceController::class);
Route::resource('leaves', LeaveController::class);
Route::resource('payroll', PayrollController::class);
Route::resource('performances', PerformanceController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('reports', ReportController::class);
Route::resource('users', UserController::class);

Route::get('reports/{report}/download', [ReportController::class, 'download'])->name('reports.download');
