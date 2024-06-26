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
use App\Mail\email;

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

Route::get('/',[AuthController::class,'loadLogin']);
Route::get('/login',function(){
    return redirect('/');
});



Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',function(){
    return redirect('/');
});


Route::get('/forgot-password',[AuthController::class,'loadForgotPassword']);
Route::post('/forgot-password',[AuthController::class,'forgotpassword'])->name('forgot-password');
// Route for displaying the password reset form
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');

// Route for handling the password reset request
Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');


Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/login',[AuthController::class,'loadLogin']);
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
    Route::get('/maintenance',[UserController::class,'maintenance'])->name('maintenance');

    //CHANGE INFORMATION AND PASSWORD

    Route::post('/profile',[UserController::class,'editProfile'])->name('profile.edit');
    Route::put('/update-profile',[SuperAdminController::class,'updateProfile'])->name('update-profile');
    Route::post('/update-password',[SuperAdminController::class,'updatePassword'])->name('update-password');

    Route::middleware('profile.complete')->group(function () {
    ///INVEST
    Route::get('/invest', [UserController::class, 'invest']);

    ///TRANSFER BALANCE
    Route::get('/transferview', [UserController::class, 'transferForm'])->name('transferview');
    Route::post('/transfer', [UserController::class, 'transfer'])->name('transfer');

    ///GATEWAYS
    Route::get('/payoutgateways', [UserController::class, 'payoutGateways'])->name('payoutGateways');

    //PAYOUT
    Route::get('/payoutpaypal', [UserController::class, 'payout'])->name('payout.paypal');
    Route::post('/process-payout', [UserController::class, 'processPayout'])->name('process.payout');
    // Route::get('/payouts/{id}/receipt', [UserController::class, 'showReceipt'])->name('payouts.receipt');
    Route::get('/payouts/{id}/pdf', [UserController::class, 'downloadPdf'])->name('payouts.pdf');


    // Route::get('/invest', [UserController::class, 'invest'])->middleware('profile.complete');
    Route::post('/invest/post', [UserController::class, 'InvestmentRequest'])->name('InvestmentRequest.store');
    Route::delete('/investment_requests/{id}', [UserController::class, 'Investmentcancel'])->name('investment_requests.cancel');
   
    //DEPOSIT
    Route::get('paypal',[UserController::class,'paypal'])->name('paypal');
    Route::post('paypal/payment',[UserController::class,'deposit'])->name('payment.paypal');
});


    //// SIDEBAR //////
    Route::get('/profile',[UserController::class,'Profile'])->name('profile');
    Route::get('/wallet',[UserController::class,'Wallet'])->name('wallet');
    Route::get('/transaction',[UserController::class,'Transaction'])->name('transaction');
    Route::get('/investment',[UserController::class,'Investment'])->name('investment');
    Route::get('/withdrawals',[UserController::class,'Withdrawals'])->name('withdrawals');


    //////CONTACT
    Route::get('/contactsupport', [UserController::class, 'showContact']);
    Route::post('/contactsend', [UserController::class, 'sendEmail']);    

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

    ////// VENDOR
    Route::get('/vendoradd',[AdminController::class,'vendorAdd'])->name('vendorAdd');
    Route::post('/vendornew',[AdminController::class,'createVendor'])->name('create.vendor');
    Route::get('/vendormanage',[AdminController::class,'vendorManage'])->name('vendorManage');
    Route::get('/vendorlist',[AdminController::class,'vendorList'])->name('vendorList');

    //////VIEW EDIT
    Route::get('/edit/{id}', [AdminController::class, 'viewVendor'])->name('edit.vendor');
    Route::put('/update/{id}', [AdminController::class, 'updateVendor'])->name('update.vendor');    

    Route::get('/vendorview',[AdminController::class,'vendorView'])->name('view.vendor');

    ////// Investment
    Route::get('/invest-receipt/{id}', [AdminController::class,'printReceiptInvestment'])->name('receiptinvestment');
    ////// deposit
    Route::get('/print-receipt/{id}', [AdminController::class,'printReceipt'])->name('print.receipt');

    Route::get('/fetch-data', [AdminController::class,'fetchData'])->name('fetch.data');

    Route::get('/investoraccount', [AdminController::class,'investorAcc'])->name('investorAcc');



  
    ///// NEW APPROVE
    Route::get('/deposit-approve/{id}', [AdminController::class, 'approveDeposit'])->name('approve.deposit');
    Route::match(['get', 'post'], '/approve/{id}', [AdminController::class, 'approve'])->name('requests.approve');
    Route::get('/deposit-cancel/{id}', [AdminController::class, 'cancelDeposit'])->name('cancel.deposit');
    Route::delete('/cancel/{id}', [AdminController::class, 'cancel'])->name('requests.cancel');
    // Route::post('/approve/{id}', [AdminController::class, 'approve'])->name('requests.approve');  


    // ////// INVESTMENT 
    Route::get('/investments', [AdminController::class, 'index'])->name('investments.index');
    Route::post('/investments', [AdminController::class, 'store'])->name('investments.store');
    Route::get('/deposit', [AdminController::class, 'Deposit'])->name('investments.deposit');


    ////ADMIN SIDE BAR ROUTE////
    Route::get('/users-profile',[AdminController::class,'profile'])->name('adminProfile');
    Route::get('/activity',[AdminController::class,'Activity'])->name('/activity');

});



