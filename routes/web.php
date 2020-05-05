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
    Route::get('/myTreatments', 'TreatmentController@index')->name('myTreatments');

    Route::get('/indexPatient/{id}','PosologyController@indexPatient')->name('posologies.indexPatient');

    Route::get('/indexPatientMedicine/{id}','MedicineController@indexPatientMedicine')->name('medicines.indexPatientMedicine');

    Route::resource('doses','DoseController');

});

//Rutas solo para médicos
Route::group(['middleware' => 'App\Http\Middleware\DoctorMiddleware'], function ()
{

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

    Route::get('/myPatientsTreatments','TreatmentController@indexDoctor')->name('myPatientsTreatments');
    Route::get('/myPatients', 'TreatmentController@showPatients')->name('treatments.showPatients');
    Route::get('/assignTreatment/{id}','TreatmentController@showAssign')->name('treatments.showAssign');
    Route::post('/assignTreatmentPatient','TreatmentController@assignTreatment')->name('treatments.assign');
    Route::resource('treatments','TreatmentController');

    Route::get('medicinesDoctor', 'MedicineController@index')->name('medicinesDoctor');
    Route::resource('medicines','MedicineController');

    Route::get('/findByTreatment/{id}','PosologyController@findByTreatment')->name('posologies.findByTreatment');
    Route::get('/createTreatment/{id}','PosologyController@createTreatment')->name('posologies.createTreatment');
    Route::resource('posologies','PosologyController');


});






