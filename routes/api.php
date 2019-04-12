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
// error: Unable to prepare route [api/user] for serialization. Uses Closure
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


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






