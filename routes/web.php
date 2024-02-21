<?php
/////////////DATABASE CONTROLLER/////////////////
use App\Http\Controllers\VendorDisplayController;
use App\Http\Controllers\UserProfileController;

/////////////USERS SIDE CONTROLLER///////////////
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class,'loadDashboardIndex']);

Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/login',[AuthController::class,'loadLogin']);
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::get('/logout',[AuthController::class,'logout']);


function set_active($route) {
    if(is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active': '';
}

// ********** User Routes *********
Route::group(['middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);

    Route::get('/activity/login/logout',[UserController::class,'activityLoginLogout'])->name('/activity/login/logout');
});

// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);

    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');

    ////SUPER ADMIN SIDE BAR ROUTE////
    Route::get('/vendor-management',[SuperAdminController::class,'vendormanagement'])->name('superAdminvendormanagement');
    Route::get('/investment-management',[SuperAdminController::class,'investment'])->name('superAdmininvestment');
    Route::get('/payment',[SuperAdminController::class,'payment'])->name('superAdminpayment');
    Route::get('/document',[SuperAdminController::class,'document'])->name('superAdmindocument');
    Route::get('/report',[SuperAdminController::class,'report'])->name('superAdminreport');
    
});

// ********** Manager Routes *********
Route::group(['prefix' => 'manager','middleware'=>['web','isManager']],function(){
    Route::get('/dashboard',[ManagerController::class,'dashboard']);
});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);

    ////ADMIN SIDE BAR ROUTE////
    Route::get('/users-profile',[AdminController::class,'profile'])->name('adminProfile');
    Route::get('/vendor-selection',[AdminController::class,'VendorSelection'])->name('adminVendorSelection');
    Route::get('/vendorUpdateUser',[AdminController::class,'vendorUpdate'])->name('adminvendorUpdate');
    Route::get('/vendorlist',[AdminController::class,'vendorList'])->name('adminvendorList');
    Route::get('/addvendor',[AdminController::class,'addVendor'])->name('adminaddVendor');
    Route::get('/invoicing-payment',[AdminController::class,'InvoicingPayment'])->name('adminInvoicingPayment');
    Route::get('/pages-contact',[AdminController::class,'contact'])->name('adminContact');
    Route::get('/pages-faq',[AdminController::class,'faq'])->name('adminFaq');
});

