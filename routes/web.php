<?php
use App\Client;
use App\Http\Controllers\InvoiceController;
use App\Invoice;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return redirect(route('login'));
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('invoice', 'InvoiceController');
Route::get('newinvoice', 'InvoiceController@newinvoice')->name('newInvoice');
Route::get('allinvoice', 'InvoiceController@allinvoice')->name('allinvoice');
Route::get('searchInvoice', 'InvoiceController@searchInvoice')->name('searchInvoices');
Route::get('destroy2/{id}', 'InvoiceController@destroy2')->name('destroy2');
Route::get('edit/{id}', 'InvoiceController@edit')->name('edit');
Route::get('offert', 'InvoiceController@offert')->name('offert');
Route::get('searchOffer', 'InvoiceController@searchOffer')->name('searchOffer');
Route::get('/testDownloadInvoice/{id}', 'InvoiceController@showInvoicePDF')->name('downloadInvoice');
Route::post('/update', 'InvoiceController@updateInvoice')->name('updateInvoice');
//Client kontroller/
Route::get('allclient', 'ClientController@allclient')->name('allclient');
Route::post('findid', 'ClientController@findid')->name('findid');
Route::post('invoiceclient', 'ClientController@invoiceclient')->name('invoiceclient');
Route::post('invoiceClient', 'ClientController@invoiceClient')->name('invoiceClient');
Route::get('searchclient', 'ClientController@searchClient')->name('searchclient');
Route::post('productclient', 'ClientController@productclient')->name('productclient');
Route::get('delete/{id}', 'ClientController@delete')->name('delete');