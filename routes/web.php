<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Rutas solo para pacientes
Route::group(['middleware' => 'App\Http\Middleware\PatientMiddleware'], function ()
{
    Route::get('/myTreatments', 'TreatmentController@indexPatient')->name('myTreatments');
    Route::get('/doctorSpecialty', 'SpecialtyController@indexPatient')->name('doctorSpecialty');

});

//Rutas solo para médicos
Route::group(['middleware' => 'App\Http\Middleware\DoctorMiddleware'], function ()
{
    Route::get('/myPatientsTreatments','TreatmentController@indexDoctor')->name('myPatientsTreatments');
    Route::get('/mySpecialty','SpecialtyController@indexDoctor')->name('mySpecialty');
    Route::get('/assignSpecialty','SpecialtyController@showAssign')->name('specialties.showAssign');
    Route::post('/assignSpecialtyDoctor','SpecialtyController@assignDoctor')->name('specialties.assign');
    Route::resource('specialties','SpecialtyController');
    Route::get('/myClinic','ClinicController@indexDoctor')->name('myClinic');
    Route::get('/assignClinic','ClinicController@showAssign')->name('clinics.showAssign');
    Route::post('/assignClinicDoctor','ClinicController@assignDoctor')->name('clinics.assign');
    Route::resource('clinics','ClinicController');
    Route::get('/myPatientsDisease','DiseaseController@index')->name('myPatientsDisease');
    Route::resource('diseases','DiseaseController');


});

Route::resource('treatments','TreatmentController');





