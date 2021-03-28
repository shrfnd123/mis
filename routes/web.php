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

Route::get('/', function () {
   return "hello world";
});

Auth::routes();


Route::get('/administrator', [App\Http\Controllers\AdminController::class, 'login'])->name('administrator');
Route::get('/UpdateUserView', [App\Http\Controllers\AdminController::class,'UpdateUserView'])->name('UpdateUserView');
Route::get('/getUserbyID', [App\Http\Controllers\AdminController::class, 'getUserbyID'])->name('getUserbyID');
Route::get('/EditUserAdmin', [App\Http\Controllers\AdminController::class, 'EditUserAdmin'])->name('EditUserAdmin');
Route::get('/ChangePassView', [App\Http\Controllers\AdminController::class, 'ChangePassView'])->name('ChangePassView');
Route::get('/ChangingP', [App\Http\Controllers\AdminController::class, 'ChangingP'])->name('ChangingP');
Route::post('/ChangePassA', [App\Http\Controllers\AdminController::class, 'ChangePassA'])->name('ChangePassA');
Route::get('/AddItemView', [App\Http\Controllers\AdminController::class,'AddItemView'])->name('AddItemView');
Route::get('/AdminLogout', [App\Http\Controllers\AdminController::class, 'AdminLogout'])->name('AdminLogout');
Route::get('/adminDashboard', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('adminDashboard');
Route::post('/AdminVerification', [App\Http\Controllers\AdminController::class, 'AdminVerification'])->name('AdminVerification');
Route::get('/AddStockView', [App\Http\Controllers\AdminController::class, 'AddStockView'])->name('AddStockView');
Route::get('/UpdateItemView', [App\Http\Controllers\AdminController::class, 'UpdateItemView'])->name('UpdateItemView');
Route::get('/ChangeItemStatus', [App\Http\Controllers\AdminController::class, 'ChangeItemStatus'])->name('ChangeItemStatus');
Route::get('/getItembyID', [App\Http\Controllers\AdminController::class, 'getItembyID'])->name('getItembyID');
Route::post('/EditItemAdmin', [App\Http\Controllers\AdminController::class, 'EditItemAdmin'])->name('EditItemAdmin');
Route::post('/AddStock', [App\Http\Controllers\AdminController::class, 'AddStock'])->name('AddStock');
Route::get('/DeclineOrder', [App\Http\Controllers\AdminController::class, 'DeclineOrder'])->name('DeclineOrder');
Route::get('/ViewOrders', [App\Http\Controllers\AdminController::class, 'ViewOrders'])->name('ViewOrders');
Route::get('/AcceptOrder', [App\Http\Controllers\AdminController::class, 'AcceptOrder'])->name('AcceptOrder');
Route::get('/CompleteOrder', [App\Http\Controllers\AdminController::class,'CompleteOrder'])->name('CompleteOrder');
Route::get('/ProductReport', [App\Http\Controllers\AdminController::class, 'ProductReport'])->name('ProductReport');
Route::get('/SetDiscount', [App\Http\Controllers\AdminController::class, 'SetDiscount'])->name('SetDiscount');
Route::get('/RemoveDiscount', [App\Http\Controllers\AdminController::class, 'RemoveDiscount'])->name('RemoveDiscount');
Route::get('/Forecasting', [App\Http\Controllers\AdminController::class, 'Forecasting'])->name('Forecasting');
Route::get('/SalesForecasting', [App\Http\Controllers\AdminController::class, 'SalesForecasting'])->name('SalesForecasting');
Route::get('/Sales', [App\Http\Controllers\AdminController::class, 'Sales'])->name('Sales');
Route::post('/AddItem', [App\Http\Controllers\AdminController::class, 'AddItem'])->name('AddItem');


//CUSTOMER
Route::get('/winter', [App\Http\Controllers\CustomerController::class, 'winter'])->name('winter');
Route::get('/temporaryspares', [App\Http\Controllers\CustomerController::class, 'temporaryspares'])->name('temporaryspares');
Route::get('/trailer', [App\Http\Controllers\CustomerController::class, 'trailer'])->name('trailer');
Route::get('/atvutv', [App\Http\Controllers\CustomerController::class, 'atvutv'])->name('atvutv');
Route::get('/lawngarden', [App\Http\Controllers\CustomerController::class, 'lawngarden'])->name('lawngarden');
Route::get('/ItemPreview/{item_id}', [App\Http\Controllers\CustomerController::class, 'ItemPreview'])->name('ItemPreview');
Route::post('/AddToCart', [App\Http\Controllers\CustomerController::class, 'AddToCart'])->name('AddToCart');
Route::post('/AddToCart1', [App\Http\Controllers\CustomerController::class, 'AddToCart1'])->name('AddToCart1');
Route::get('/index', [App\Http\Controllers\CustomerController::class, 'index'])->name('index');
// Route::get('/test', 'AdminControllertest')->name('test');
Route::get('/CartPreview', [App\Http\Controllers\CustomerController::class, 'CartPreview'])->name('CartPreview');
Route::get('/Recommender', [App\Http\Controllers\CustomerController::class, 'Recommender'])->name('Recommender');
Route::get('/RemoveItem', [App\Http\Controllers\CustomerController::class, 'RemoveItem'])->name('RemoveItem');
Route::get('/LoginCustomer', [App\Http\Controllers\CustomerController::class, 'LoginCustomer'])->name('LoginCustomer');
Route::get('/SignUp', [App\Http\Controllers\CustomerController::class, 'SignUp'])->name('SignUp');
Route::get('/EditProfile', [App\Http\Controllers\CustomerController::class, 'EditProfile'])->name('EditProfile');
Route::get('/EditItem', [App\Http\Controllers\CustomerController::class, 'EditItem'])->name('EditItem');
Route::get('/CheckOut', [App\Http\Controllers\CustomerController::class, 'CheckOut'])->name('CheckOut');
Route::post('/Register', [App\Http\Controllers\CustomerController::class, 'Register'])->name('Register');
Route::post('/UserVerification', [App\Http\Controllers\CustomerController::class, 'UserVerification'])->name('UserVerification');
Route::post('/EditAccount', [App\Http\Controllers\CustomerController::class, 'EditAccount'])->name('EditAccount');
Route::get('/logout', [App\Http\Controllers\CustomerController::class, 'logout'])->name('logout');
Route::post('/ChangePassword', [App\Http\Controllers\CustomerController::class, 'ChangePassword'])->name('ChangePassword');
Route::get('/ChangePasswordView', [App\Http\Controllers\CustomerController::class, 'ChangePasswordView'])->name('ChangePasswordView');
Route::get('/historyView', [App\Http\Controllers\CustomerController::class, 'historyView'])->name('historyView');





