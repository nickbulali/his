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
    Route::resource('vitalsigns', 'VitalSignController');
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
    Route::resource('drugs', 'DrugController');

    //Encounter
    Route::resource('encounterclass', 'EncounterClassController');
    Route::resource('encounterstatus', 'EncounterStatusController');
    Route::resource('encounter', 'EncounterController');
    Route::get('encounter/patient/{id}', 'EncounterController@patientVisits');
    Route::post('encounter/addtests', 'EncounterController@addTests');
    Route::post('encounter/specimencollection', 'EncounterController@specimenCollection');

    //FamilyHistory
    Route::resource('familyhistory', 'FamilyHistoryController');

    //Gender
    Route::resource('gender', 'GenderController');

    //Gender
    Route::resource('maritalstatus', 'MaritalStatusController');

    //GynecologicHistories
    Route::resource('gynecologichistories', 'GynecologicHistoriesController');

    //Lab Test Types
    Route::resource('labtesttype', 'LabTestTypeController');
    Route::resource('labtesttypecategory', 'LabTestTypeCategoryController');
    Route::resource('tests', 'TestController');

    //Location
    Route::resource('location', 'LocationController');

    //MedicalSurgicalHistories
    Route::resource('medicalsurgicalhistories', 'MedicalSurgicalHistoriesController');

    //Medications
    Route::resource('medications', 'MedicationController');

    //Medication Sheets
    Route::resource('medicationsheets', 'MedicalSheetsController');

    //MedicationStauses
    Route::resource('medicationstatus', 'MedicationStatusController');

    //Name
    Route::resource('name', 'NameController');

    //ObstericHistories
    Route::resource('obstetrichistories', 'ObstetricHistoriesController');

    //Organization
    Route::resource('organization', 'OrganizationController');

    //Patient
    Route::get('patient/testrequest', 'PatientController@testRequest');
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
    Route::resource('vitalsigns', 'VitalSignController');

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

    //Beds
    Route::resource('bed', 'BedController');
 
    //Ward
    Route::resource('ward', 'WardController');

    //bedAllocation controller
    Route::resource('bedAllocation', 'bedAllocationController');
    Route::get('discharge/{id}', 'bedAllocationController@discharge');


    //Anc signs 
    Route::resource('anc_signs', 'anc_signsController');

    //Anc services
    Route::resource('anc_service', 'anc_serviceController');

    //Out-Patient Registration
    Route::resource('outPatientRegistration', 'outPatientRegistrationController');

    //Next Of Kin 
    Route::resource('nextOfKin', 'nextOfKinController');
 

});
