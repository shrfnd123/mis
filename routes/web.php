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
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
   return "hello world";
});

Auth::routes();


Route::get('/administrator', AdminController::class. '@login')->name('adminlogin');
Route::get('/AddItemView', AdminController::class. '@AddItemView')->name('AddItemView');
Route::get('/AdminLogout', AdminController::class. '@AdminLogout')->name('AdminLogout');
Route::get('/adminDashboard', AdminController::class. '@adminDashboard')->name('adminDashboard');
Route::post('/AdminVerification', AdminController::class. '@AdminVerification')->name('AdminVerification');
Route::get('/AddStockView', AdminController::class. '@AddStockView')->name('AddStockView');
Route::get('/UpdateItemView', AdminController::class. '@UpdateItemView')->name('UpdateItemView');
Route::get('/ChangeItemStatus', 'AdminController@ChangeItemStatus')->name('ChangeItemStatus');
Route::get('/getItembyID', 'AdminController@getItembyID')->name('getItembyID');
Route::post('/EditItemAdmin', 'AdminController@EditItemAdmin')->name('EditItemAdmin');
Route::get('/AddStock', 'AdminController@AddStock')->name('AddStock');
Route::get('/DeclineOrder', 'AdminController@DeclineOrder')->name('DeclineOrder');
Route::get('/ViewOrders', AdminController::class. '@ViewOrders')->name('ViewOrders');
Route::get('/AcceptOrder', 'AdminController@AcceptOrder')->name('AcceptOrder');
Route::get('/CompleteOrder', 'AdminController@CompleteOrder')->name('CompleteOrder');
Route::get('/ProductReport', AdminController::class. '@ProductReport')->name('ProductReport');
Route::get('/SetDiscount', 'AdminController@SetDiscount')->name('SetDiscount');
Route::get('/RemoveDiscount', 'AdminController@RemoveDiscount')->name('RemoveDiscount');
Route::get('/Forecasting', AdminController::class. '@Forecasting')->name('Forecasting');
Route::get('/SalesForecasting', 'AdminController@SalesForecasting')->name('SalesForecasting');
Route::get('/Sales', AdminController::class. '@Sales')->name('Sales');
Route::post('/AddItem', AdminController::class. '@AddItem')->name('AddItem');

//CUSTOMER
Route::get('/winter', CustomerController::class. '@winter')->name('winter');
Route::get('/temporaryspares', CustomerController::class. '@temporaryspares')->name('temporaryspares');
Route::get('/trailer', CustomerController::class. '@trailer')->name('trailer');
Route::get('/atvutv', CustomerController::class. '@atvutv')->name('atvutv');
Route::get('/lawngarden', CustomerController::class. '@lawngarden')->name('lawngarden');
Route::get('/ItemPreview/{item_id}', CustomerController::class. '@ItemPreview')->name('ItemPreview');
Route::post('/AddToCart', [CustomerController::class, '@AddToCart'])->name('AddToCart');
Route::post('/AddToCart1', [CustomerController::class, '@AddToCart1'])->name('AddToCart1');
Route::get('/index', [CustomerController::class, 'index'])->name('index');
Route::get('/test', 'AdminController@test')->name('test');
Route::get('/CartPreview', CustomerController::class. '@CartPreview')->name('CartPreview');
Route::get('/Recommender', CustomerController::class. '@Recommender')->name('Recommender');
Route::get('/RemoveItem', [CustomerController::class, '@RemoveItem'])->name('RemoveItem');
Route::get('/LoginCustomer', CustomerController::class. '@LoginCustomer')->name('LoginCustomer');
Route::get('/SignUp', [CustomerController::class, '@SignUp'])->name('SignUp');
Route::get('/EditProfile', CustomerController::class. '@EditProfile')->name('EditProfile');
Route::get('/EditItem', [CustomerController::class, '@EditItem'])->name('EditItem');
Route::get('/CheckOut', [CustomerController::class, '@CheckOut'])->name('CheckOut');
Route::post('/Register', [CustomerController::class, '@Register'])->name('Register');
Route::post('/UserVerification', CustomerController::class. '@UserVerification')->name('UserVerification');
Route::post('/EditAccount', CustomerController::class. '@EditAccount')->name('EditAccount');
Route::get('/logout', CustomerController::class. '@logout')->name('logout');
Route::post('/ChangePassword', [CustomerController::class, '@ChangePassword'])->name('ChangePassword');
Route::get('/ChangePasswordView', [CustomerController::class, '@ChangePasswordView'])->name('ChangePasswordView');




