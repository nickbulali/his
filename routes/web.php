<?php

/*
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// error: Unable to prepare route [api/user] for serialization. Uses Closure
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/api/customers', 'CustomerController@search');
Route::get('/api/products', 'ProductController@search');

Route::resource('/api/invoices', 'InvoiceController');
