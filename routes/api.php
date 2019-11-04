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
    Route::resource('diagnosis', 'DiagnosisController');
    Route::resource('medications', 'MedicationsController');
    Route::resource('radiology', 'RadiologyController');
    Route::resource('vitalsigns', 'VitalSignsController');
    Route::post('/register', 'Auth\APIController@register');
    Route::post('/login', 'Auth\APIController@login');
    Route::get('/auth/signup/activate/{token}', 'Auth\APIController@signupActivate');
   // Route::get('users/count/{id}', 'InvoiceController@countUsers');
    Route::get('/users/count', 'UserController@countUsers');
    Route::get('/patient/count', 'PatientController@countPatients');
    Route::get('/appointment/count', 'AppointmentController@countAppointments');
    Route::get('/appointment/report', 'AppointmentController@report');
    Route::middleware('auth:api')->group( function () {
    Route::post('/logout', 'Auth\APIController@logout');
    Route::get('/get-user', 'Auth\APIController@getUser');
    Route::get('/get-user-model', 'Auth\APIController@getUserModel');

    //invoice
    Route::get('/invoice/{id}', 'InvoiceController@show');
    Route::get('/invoices', 'API\InvoiceController@index');
    Route::post('/invoice', 'API\InvoiceController@store');
    Route::put('/invoice/{id}', 'API\InvoiceController@update');
    Route::get('/payment/{id}', 'PaymentController@show');
    Route::get('/payments/create', 'PaymentController@create');
    Route::delete('/invoice/{id}', 'API\InvoiceController@delete');

    //chargeSheet
    Route::get('/chargeSheet/{id}', 'API\ChargeSheetController@show');

    Route::get('/chargeSheets', 'API\ChargeSheetController@index');

    Route::post('/chargeSheet', 'API\ChargeSheetController@store');

    Route::put('/chargeSheet/{id}', 'API\ChargeSheetController@update');

    Route::delete('/chargeSheet/{id}', 'API\ChargeSheetController@delete');

    //payment
    

    Route::get('/payments', 'PaymentController@index');

    Route::post('/payment', 'PaymentController@store');

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
    Route::resource('allergy', 'AllergyController');
    //Diagnosis
    Route::resource('diagnosis', 'DiagnosisController');
    //AntenatalHistory
    Route::resource('antenatalhistory', 'AntenatalHistoryController');

    //AnthropometricMeasurements
    Route::resource('anthropometricmeasurement', 'AnthropometricMeasurementController');

    //BodySystems
    Route::resource('bodysystem', 'BodySystemController');

    //Code
    Route::resource('code', 'CodeController');

    //CodeSystem
    Route::resource('codesystem', 'CodeSystemController');

    //Conditions
    Route::resource('condition', 'ConditionController');

    //ConditionTypes
    Route::resource('conditiontype', 'ConditionTypeController');

    //CounterController
    Route::resource('counter', 'CounterController');

    //DiagnosticTests
    Route::resource('diagnostictest', 'DiagnosticTestController');

    //Dosage
    Route::resource('dosage', 'DosageController');

    //DrugAbuse
    Route::resource('drugabuse', 'DrugAbuseController');

    //DrugCategory
    Route::resource('anthropometricmeasurements', 'AnthropometricMeasurementsController');

    //DrugCategories
    Route::resource('drugcategoy', 'DrugCategoryController');

    //Drugs
    Route::resource('drug', 'DrugController');

    //Encounter
    Route::resource('encounterclass', 'EncounterClassController');
    Route::resource('encounterstatus', 'EncounterStatusController');
    Route::resource('encounter', 'EncounterController');
    Route::get('encounter/patient/{id}', 'EncounterController@patientVisits');
    Route::post('encounter/addtests', 'EncounterController@addTests');
    Route::post('encounter/specimencollection', 'EncounterController@specimenCollection');

    //FamilyHistory
    Route::resource('familyhistory', 'FamilyHistoryController');

    //familyRelations
    Route::resource('familyrelation', 'FamilyRelationsController');

    //Gender
    Route::resource('gender', 'GenderController');

    //Gender
    Route::resource('maritalstatus', 'MaritalStatusController');

    //GynecologicHistory
    Route::resource('gynecologichistory', 'GynecologicHistoryController');

    //Lab Test Types
    Route::resource('labtesttype', 'LabTestTypeController');
    Route::resource('labtesttypecategory', 'LabTestTypeCategoryController');

    //Location
    Route::resource('location', 'LocationController');

    //MedicalSurgicalHistory
    Route::resource('medicalsurgicalhistory', 'MedicalSurgicalHistoryController');

    //Medications
    Route::resource('medication', 'MedicationController');

    //Medication Sheets
    Route::resource('medicationsheet', 'MedicalSheetController');

    //MedicationStauses
    Route::resource('medicationstatus', 'MedicationStatusController');

    //Name
    Route::resource('name', 'NameController');

    //ObstericHistories
    Route::resource('obstetrichistory', 'ObstetricHistoryController');

    //Organization
    Route::resource('organization', 'OrganizationController');

    //Patient
    Route::resource('patient/testrequest', 'PatientController');
    Route::resource('patient/get_patients', 'PatientController');
    Route::resource('patient', 'PatientController');
    Route::post('patient/testrequest', 'PatientController@testRequest');
    Route::get('patient/{patientId}/allergy/{allergyId}', 'PatientController@attachAllergy');
    Route::get('patient/{patientId}/diagnosis/{diagnosisId}', 'PatientController@attachDiagnosis');
    //Queue
    Route::resource('queue', 'QueueController');
    Route::get('queuestats', 'QueueController@stats');

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
    Route::resource('presentpregnancy', 'PresentPregnancyController');

    //Results
    Route::post('result', 'ResultController@store');
    Route::post('result/show/{id}', 'ResultController@show');
    Route::resource('resulttype', 'ResultTypeController');

    //Roles
    Route::resource('role', 'RoleController');
    Route::get('roleuser/attach', 'RoleUserController@attach');
    Route::get('roleuser/detach', 'RoleUserController@detach');
    Route::get('roleuser', 'RoleUserController@index');
       Route::resource('test', 'TestController');
    //Smoking
    Route::resource('smoking', 'SmokingController');

    //Social History
    Route::resource('socialhistory', 'SocialHistoryController');

    //Environmental History
    Route::resource('environmentalhistory', 'EnvironmentalHistoryController');

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
    Route::resource('vitalsign', 'VitalSignController');

    //Radiology
    Route::resource('/radiology', 'RadiologyController');

    //Billing|Invoices
    Route::resource('invoice', 'InvoiceController');
    Route::resource('payment', 'PaymentController');
    Route::resource('item-category', 'ItemCategoryController');
    Route::resource('/expense-category', 'ExpensesCategoryController');
    Route::resource('/expenses', 'ExpenseController');
    Route::resource('item', 'ItemController');

    //Appointment
    Route::resource('appointment', 'AppointmentController');

    //Users
    Route::resource('users', 'UserController');
    Route::post('user/image', 'UserController@profilepic');

    //Inventory
    Route::resource('supplier', 'SupplierController');
    Route::resource('supplies', 'SuppliesController');
    Route::resource('stock', 'StockController');
    Route::resource('request', 'RequestController');
    Route::resource('issueStock', 'StockIssueController');
    Route::get('stockDetails/{id}', 'StockController@stockDetails');
    Route::get('requestIssue/{id}', 'RequestController@requestIssue');

    Route::post('/mpesa-post', 'MpesaController@newRequest');
    Route::get('add-to-log', 'HomeController@myTestAddToLog');
    Route::get('logActivity', 'HomeController@logActivity');
});
