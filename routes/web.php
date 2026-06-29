<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\ScreeningController;

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
/*Routa Dashboard*/
Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');
/*Routa Patient*/
route::delete('/Patients/{id}','PatientController@destroy');
Route::get('/patient', 'PatientController@index');
Route::get('/patient/create', 'PatientController@create');
Route::post('/patient', 'PatientController@store')->name('patient.store');
Route::get('/patient/edit/{id}', 'PatientController@edit')->name('patient.edit');
Route::put('/patient/update/{id}', 'PatientController@update')->name('patient.update');
Route::delete('/patient/delete/{id}', 'PatientController@destroy')->name('patient.delete');
Route::get('/patient/show{id}', 'PatientController@show')->name('patient.show');
/*Routa Doctor*/
Route::get('/doctor', 'DoctorController@index')->name('doctor.index');
//mostra formlario
Route::get('/doctor/create', 'DoctorController@create')->name('doctor.create');
//guarda dados do formulario
Route::post('/doctor/store', 'DoctorController@store')->name('doctor.store');
Route::get('/doctor/edit/{id}', 'DoctorController@edit')->name('doctor.edit');
Route::put('/doctor/update/{id}', 'DoctorController@update')->name('doctor.update');
Route::delete('/doctor/delete/{id}', 'DoctorController@destroy')->name('doctor.delete');
Route::get('/doctor/show/{id}', 'DoctorController@show')->name('doctor.show');

Route::get('/nurse', 'NurseController@index')->name('nurse.index');
Route::get('/nurse/create', 'NurseController@create')->name('nurse.create');
Route::post('/nurse', 'NurseController@store')->name('nurse.store');
Route::get('/nurse/{id}/edit', 'NurseController@edit')->name('nurse.edit');
Route::get('/nurse/{id}', 'NurseController@show')->name('nurse.show');
Route::put('/nurse/{id}', 'NurseController@update')->name('nurse.update');
Route::delete('/nurse/delete/{id}', 'NurseController@destroy')->name('nurse.delete');

Route::get('/screening', 'ScreeningController@index')->name('screening.index');
Route::get('/screening/create', 'ScreeningController@create')->name('screening.create');
Route::post('/screening', 'ScreeningController@store')->name('screening.store');
Route::get('/screening/{id}/edit', 'ScreeningController@edit')->name('screening.edit');
Route::get('/screening/{id}', 'ScreeningController@show')->name('screening.show');
Route::put('/screening/{id}', 'ScreeningController@update')->name('screening.update');
Route::delete('/screening/delete/{id}', 'ScreeningController@destroy')->name('screening.delete');

