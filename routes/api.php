<?php

use Illuminate\Http\Request;

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

Route::post('/register', 'Auth\APIController@register');
Route::post('/login', 'Auth\APIController@login');
Route::get('/auth/signup/activate/{token}', 'Auth\APIController@signupActivate');

Route::middleware('auth:api')->group( function () {
    Route::post('/logout', 'Auth\APIController@logout');
    Route::get('/get-user', 'Auth\APIController@getUser');
    Route::get('/get-user-model', 'Auth\APIController@getUserModel');

    //invoice
    Route::get('/invoice/{id}', 'API\InvoiceController@show');

    Route::get('/invoices', 'API\InvoiceController@index');

    Route::post('/invoice', 'API\InvoiceController@store');

    Route::put('/invoice/{id}', 'API\InvoiceController@update');

    Route::delete('/invoice/{id}', 'API\InvoiceController@delete');

    //chargeSheet
    Route::get('/chargeSheet/{id}', 'API\ChargeSheetController@show');

    Route::get('/chargeSheets', 'API\ChargeSheetController@index');

    Route::post('/chargeSheet', 'API\ChargeSheetController@store');

    Route::put('/chargeSheet/{id}', 'API\ChargeSheetController@update');

    Route::delete('/chargeSheet/{id}', 'API\ChargeSheetController@delete');

    //payment
    Route::get('/payment/{id}', 'API\PaymentController@show');

    Route::get('/payments', 'API\PaymentController@index');

    Route::post('/payment', 'API\PaymentController@store');

    Route::put('/payment/{id}', 'API\PaymentController@update');

    Route::delete('/payment/{id}', 'API\PaymentController@delete');

    //order
    Route::get('/order/{id}', 'API\OrderController@show');

    Route::get('/orders', 'API\OrderController@index');

    Route::post('/order', 'API\OrderController@store');

    Route::put('/order/{id}', 'API\OrderController@update');

    Route::delete('/order/{id}', 'API\OrderController@delete');

    //AdmissionEncounter
    Route::resource('admissionencounter', 'AdmissionEncounterController');

    //Admission
    Route::resource('admission', 'AdmissionController');

    //Alcohol
    Route::resource('alcohol', 'AlcoholController');

    //Allergies
    Route::resource('allergies', 'AllergiesController');

    //AntenatalHistory
    Route::resource('antenatalhistory', 'AntenatalHistoryController');

    //AnthropometricMeasurements
    Route::resource('anthropometricmeasurements', 'AnthropometricMeasurementsController');

    //BodySystems
    Route::resource('bodysystems', 'BodySystemsController');

    //Code
    Route::resource('code', 'CodeController');

    //CodeSystem
    Route::resource('codesystem', 'CodeSystemController');

    //Conditions
    Route::resource('conditions', 'ConditionsController');

    //ConditionTypes
    Route::resource('conditiontype', 'ConditionTypeController');

    //CounterController
    Route::resource('counter', 'CounterController');

    //DiagnosticTests
    Route::resource('diagnostictests', 'DiagnosticTestsController');

    //Dosage
    Route::resource('dosage', 'DosageController');

    //DrugAbuse
    Route::resource('drugabuse', 'DrugAbuseController');

    //DrugCategory
    Route::resource('anthropometricmeasurements', 'AnthropometricMeasurementsController');

    //DrugCategories
    Route::resource('drugcategories', 'DrugCategoriesController');

    //Drugs
    Route::resource('drugs', 'DrugsController');

    //Encounter
    Route::resource('encounterclass', 'EncounterClassController');
    Route::resource('encounterstatus', 'EncounterStatusController');
    Route::resource('encounter', 'EncounterController');
    Route::post('encounter/addtests', 'EncounterController@addTests');
    Route::post('encounter/specimencollection', 'EncounterController@specimenCollection');

    //FamilyHistory
    Route::resource('familyhistory', 'FamilyHistoryController');

    //Gender
    Route::resource('gender', 'GenderController');

    //GynecologicHistories
    Route::resource('gynecologichistories', 'GynecologicHistoriesController');

    //Lab Test Types
    Route::resource('labtesttype', 'LabTestTypeController');
    Route::resource('labtesttypecategory', 'LabTestTypeCategoryController');

    //Location
    Route::resource('location', 'LocationController');

    //MedicalSurgicalHistories
    Route::resource('medicalsurgicalhistories', 'MedicalSurgicalHistoriesController');

    //Medications
    Route::resource('medications', 'MedicationsController');

    //Medication Sheets
    Route::resource('medicationsheets', 'MedicalSheetsController');

    //MedicationStauses
    Route::resource('medicationstatus', 'MedicationStatusesController');

    //Name
    Route::resource('name', 'NameController');

    //ObstericHistories
    Route::resource('obstetrichistories', 'ObstetricHistoriesController');

    //Organization
    Route::resource('organization', 'OrganizationController');

    //Patient
    Route::resource('patient/testrequest', 'PatientController');
    Route::resource('patient/get_patients', 'PatientController');
    Route::resource('patient', 'PatientController');
    Route::post('patient/testrequest', 'PatientController@testRequest');

    //Permission
    Route::resource('permission', 'PermissionController');
    Route::get('permissionrole/attach', 'PermissionRoleController@attach');
    Route::get('permissionrole/detach', 'PermissionRoleController@detach');
    Route::get('permissionrole', 'PermissionRoleController@index');

    //Presenting Complaints
    Route::resource('presentingcomplaints', 'PresentingComplaintsController');

    //Presenting Illness
    Route::resource('presentingillness', 'PresentingIllnessController');

    //Present Pregnancies
    Route::resource('presentpregnancies', 'PresentPregnanciesController');

    //Results
    Route::post('result', 'ResultController@store');
    Route::post('result/show/{id}', 'ResultController@show');
    Route::resource('resulttype', 'ResultTypeController');

    //Roles
    Route::resource('role', 'RoleController');
    Route::get('roleuser/attach', 'RoleUserController@attach');
    Route::get('roleuser/detach', 'RoleUserController@detach');
    Route::get('roleuser', 'RoleUserController@index');

    //Smoking
    Route::resource('smoking', 'SmokingController');

    //Social History
    Route::resource('socialhistory', 'SocialHistoryController');

    //Specimen
    Route::resource('specimen', 'SpecimenController');
    Route::resource('specimentype', 'SpecimenTypeController');
    Route::get('specimentype/specimencollection/{id}', 'SpecimenTypeController@specimencollection');

    //Surgeries
    Route::resource('surgeries', 'SurgeriesController');

    //SystemEnquiry
    Route::resource('systemenquiry', 'SystemEnquiryController');

    //Test
    Route::post('test/specimencollection', 'TestController@specimenCollection');
    Route::resource('test', 'TestController');

    //VitalSigns
    Route::resource('vitalsigns', 'VitalSignsController');

    //Xrays
    Route::resource('xrays', 'XraysController');

    //Billing|Invoices
    Route::resource('/invoice', 'InvoiceController');
    Route::resource('/item-category', 'ItemCategoryController');
    Route::resource('/item', 'ItemController');
});
