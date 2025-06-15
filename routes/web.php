<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CareGiverController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/test-user-type', function () {
    return currentUserType();
});

Route::match(['get','post'], 'login', [AdminController::class, "login"])->name("admin_login");
Route::post('logout', [AdminController::class, 'logout'])->name('logout');
//////user login

Route::get('/profile',[CustomerController::class,'info'])->name('profile');

Route::get('/',[HomeController::class,'index'])->name('index');
 Route::post('/companies/store', [HomeController::class, 'store'])->name('company.add');
Route::match(['get','post'],'/sign-up',[AdminController::class,'signup'])->name('signup');
//dashbaord
Route::group(['middleware' => ['user_auth']], function () {
    Route::get('reseller_dashboard', [AdminController::class, 'reseller_dashboard'])->name('reseller.dashboard');
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    ////items routes
    ///////
    Route::get('view-clients',[ClientController::class,'view'])->name('view-clients');
    Route::post('/add-client', [ClientController::class, 'add'])->name('add-client');
    Route::match(['get','post'],'/edit/{id}',[ClientController::class,'edit'])->name('client.edit');
    Route::get('/clients/delete/{id}', [ClientController::class, 'delete'])->name('clients.delete');
    Route::match(['get', 'post'], '/documents', [DocumentController::class, 'view'])->name('documents');
    Route::match(['get', 'post'], '/schdules', [ScheduleController::class, 'view'])->name('schdules');
    Route::post('/add-caregiver', [CareGiverController::class, 'add'])->name('add-caregiver');
    Route::get('view-caregivers',[CareGiverController::class,'view'])->name('view-caregivers');
    Route::get('/caregiver/delete/{id}', [CareGiverController::class, 'delete'])->name('caregiver.delete');
    Route::match(['get','post'],'/caregiver_edit/{id}',[CaregiverController::class,'edit'])->name('caregiver.edit');
    Route::get('/clients/profile/{id}', [ClientController::class, 'profile'])->name('client.profile');
    Route::get('/caregiver/profile/{id}', [CareGiverController::class, 'profile'])->name('caregiver.profile');
    Route::get('/nurse',[NurseController::class,'view'])->name('nurses');
    Route::post('/nurse/add',[NurseController::class,'add'])->name('nurse.add');
    Route::get('/nurses/delete/{id}', [NurseController::class, 'delete'])->name('nurse.delete');
    Route::post('/nurse/edit/{id}', [NurseController::class, 'edit'])->name('nurse.edit');
    Route::post('/schedule/add',[ScheduleController::class,'add'])->name('schedule.add');
    Route::get('/schedule/delete/{id}', [ScheduleController::class, 'delete'])->name('schedule.delete');
    Route::match(['get','post'],'schedule/edit/{id}',[ScheduleController::class,'edit'])->name('schedule.edit');
    Route::post('/schedules/get', [ScheduleController::class, 'getSchedules'])->name('schedules.get');
    Route::get('/calendar-header', [ScheduleController::class, 'calendarHeader'])->name('calendar.header');
    Route::get('/calendar-data', [ScheduleController::class, 'calendarData'])->name('calendar.data');
    Route::post('add_task',[ScheduleController::class,'add_task'])->name('add_task');
    Route::get('schedule_tasks/{id}',[ScheduleController::class,'schedule_tasks'])->name('schedule.tasks');
    Route::post('update_task',[ScheduleController::class,'update_status'])->name('update_status');
    Route::post('add_remarks',[ScheduleController::class,'add_remarks_to_schedule'])->name('add_remarks_to_schedule');
    Route::post('/schedules/{id}/signature', [ScheduleController::class, 'add_signature'])->name('add_signature');
    Route::match(['get','post'],'/add_folder',[DocumentController::class,"add_folder"])->name('folder.add');
    Route::get('/folder/delete/{id}', [DocumentController::class, 'delete'])->name('folder.delete');
    Route::post('edit_folder',[DocumentController::class,'edit_folder'])->name('folder.edit');
    Route::match(['get','post'],'/add_document',[DocumentController::class,"add"])->name('document.add');
    Route::get('/documents/{id}', [DocumentController::class, 'documents'])->name('folder.documents');
    Route::get('/document/delete/{id}', [DocumentController::class, 'delete_doc'])->name('document.delete');
    Route::get('/schedule/profile/{id}',[ScheduleController::class,'profile'])->name('schedule.profile');

});

