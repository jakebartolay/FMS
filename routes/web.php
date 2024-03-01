<?php
/////////////DATABASE CONTROLLER/////////////////
use App\Http\Controllers\VendorDisplayController;
use App\Http\Controllers\UserProfileController;

/////////////USERS SIDE CONTROLLER///////////////
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployeeController;
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


Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',function(){
    return redirect('/');
});

Route::get('/forgot-password',[AuthController::class,'loadForgotPassword']);
Route::post('/forgot-password',[AuthController::class,'forgotpassword'])->name('forgot-password');
Route::get('/login',function(){
    return redirect('/');
});

Route::get('/',[AuthController::class,'loadLogin']);
Route::post('/login',[AuthController::class,'login'])->name('login');

//// GOGOGLE

Route::get('/auth/google',[AuthController::class,'googlepage']);
Route::get('/auth/google/callback',[AuthController::class,'googlecallback']);

Route::get('/admin/login',[AuthController::class,'loadBackEnd']);
Route::post('/admin/login',[AuthController::class,'backEnd'])->name('admin/login');

Route::get('/admin/logout',[AuthController::class,'admin/logout']);
Route::get('/logout',[AuthController::class,'logout']);


function set_active($route) {
    if(is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active': '';
}

// ********** User Routes *********
Route::group(['middleware' => ['web', 'isUser']], function () {
    Route::get('/dashboard',[UserController::class,'dashboard']);
    Route::get('/error',[UserController::class,'Error']);

    //CHANGE INFORMATION AND PASSWORD

    Route::post('/profile',[SuperAdminController::class,'editProfile'])->name('/profile');
    Route::put('/update-profile',[SuperAdminController::class,'updateProfile'])->name('update-profile');
    Route::post('/update-password',[SuperAdminController::class,'updatePassword'])->name('update-password');

    ///TRANSACTION
    Route::post('/deposit', [UserController::class, 'Deposit'])->name('deposit');
    Route::get('/invest', [UserController::class, 'invest'])->name('invest');
    Route::post('/invest/post', [UserController::class, 'InvestmentRequest'])->name('InvestmentRequest.store');
    Route::delete('/investment_requests/{id}', [UserController::class, 'Investmentcancel'])->name('investment_requests.cancel');

    ///TRANSFER BALANCE
    Route::post('/transfer-balance', [UserController::class, 'transfer'])->name('transfer.balance');
    //// SIDEBAR //////
    Route::get('/profile',[UserController::class,'Profile'])->name('/profile');
    Route::get('/wallet',[UserController::class,'Wallet'])->name('/wallet');
    Route::get('/transaction',[UserController::class,'Transaction'])->name('/transaction');
    Route::get('/investment',[UserController::class,'Investment'])->name('investment');
    Route::get('/withdrawals',[UserController::class,'Withdrawals'])->name('/withdrawals');
    Route::get('/contactsupport',[UserController::class,'ContactSupport'])->name('/contactsupport');
    Route::get('/paywithpaypal',[UserController::class,'paywithPaypal'])->name('/paywithpaypal');

    Route::get('/activity/login/logout',[UserController::class,'activityLoginLogout'])->name('/activity/login/logout');
});

// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);

    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::post('/createUsers', [UserController::class, 'createUsers'])->name('createUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');

    ////SUPER ADMIN SIDE BAR ROUTE////
    Route::get('/vendor-management',[SuperAdminController::class,'vendormanagement'])->name('superAdminvendormanagement');
    Route::get('/investment-management',[SuperAdminController::class,'investment'])->name('superAdmininvestment');
    Route::get('/payment',[SuperAdminController::class,'payment'])->name('superAdminpayment');
    Route::get('/document',[SuperAdminController::class,'document'])->name('superAdmindocument');
    Route::get('/report',[SuperAdminController::class,'report'])->name('superAdminreport');
    
});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);

    Route::get('/investments', [AdminController::class, 'index'])->name('investments.index');
    Route::get('/create', [AdminController::class, 'create'])->name('investments.create');
    Route::post('/investments', [AdminController::class, 'store'])->name('investments.store');
    Route::get('/deposit', [AdminController::class, 'Deposit'])->name('investments.deposit');

    ////// APPROVE
    Route::post('/approve/{id}/', [AdminController::class, 'approve'])->name('deposit_requests.approve');
    Route::delete('/cancel/{id}', [AdminController::class, 'cancel'])->name('deposit_requests.cancel');
    
    ////// INVESTMENT APPROVE
    Route::post('/Investmentapprove/{id}/', [AdminController::class, 'Investmentapprove'])->name('investment_requests.approve');
    Route::delete('/Investmentcancel/{id}', [AdminController::class, 'Investmentcancel'])->name('investment_requests.cancel');



    ////ADMIN SIDE BAR ROUTE////
    Route::get('/users-profile',[AdminController::class,'profile'])->name('adminProfile');
    Route::get('/activity',[AdminController::class,'Activity'])->name('/activity');
    Route::get('/vendorlist',[AdminController::class,'vendorList'])->name('/vendorlist');
});


// ********** Employee Routes *********
Route::group(['prefix' => 'employee','middleware'=>['web','isEmployee']],function(){
    Route::get('/dashboard',[EmployeeController::class,'dashboard']);
});



