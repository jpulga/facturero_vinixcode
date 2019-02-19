<?php

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

Route::resource('cash_receipts', 'CashReceiptController'); 
Route::get('/cash_receipts/{cash_receipt}/duplicate', 'CashReceiptController@duplicate')->name('cash_receipts.duplicate');

Route::resource('invoices', 'InvoiceController'); 
Route::get('/invoices/{invoice}/duplicate', 'InvoiceController@duplicate')->name('invoices.duplicate');

Route::resource('egresses', 'EgressController'); 
Route::get('/egresses/{egress}/duplicate', 'EgressController@duplicate')->name('egresses.duplicate');


