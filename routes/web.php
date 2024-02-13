<?php
/////////////DATABASE CONTROLLER/////////////////
use App\Http\Controllers\VendorDisplayController;

/////////////USERS SIDE CONTROLLER///////////////
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SubAdminController;
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

Route::get('/', function () {
    return view('index');
});

function set_active($route) {
    if(is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active': '';
}


// ********** User Routes *********
Route::group(['middleware'=>['web','isUser']],function(){
    Route::get('/dashboard',[UserController::class,'dashboard']);
});

////////////ADMIN SIDE/////////////

// ********** Super Admin Routes *********
Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'dashboard']);

    Route::get('/users',[SuperAdminController::class,'users'])->name('superAdminUsers');
    Route::get('/manage-role',[SuperAdminController::class,'manageRole'])->name('manageRole');
    Route::post('/update-role',[SuperAdminController::class,'updateRole'])->name('updateRole');
});

// ********** Sub Admin Routes *********
Route::group(['prefix' => 'sub-admin','middleware'=>['web','isSubAdmin']],function(){
    Route::get('/dashboard',[SubAdminController::class,'dashboard']);
});

// ********** Admin Routes *********
Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard']);
});


Route::get('/vendor-management', [VendorDisplayController::class, 'show']);

Route::get('/investment-management', function () {
    return view('sidebar.investmentmanagement');
});

Route::get('/payment', function () {
    return view('sidebar.payment');
});

Route::get('/document', function () {
    return view('sidebar.document');
});

Route::get('/report', function () {
    return view('sidebar.report');
});

Route::get('/pages-contact', function () {
    return view('sidebar.contact_page');
});

Route::get('/pages-faq', function () {
    return view('sidebar.faq');
});


Route::get('/users-profile', function () {
    return view('user_profile');
});

// ////////////LOGIN REGISTER SIDE/////////////

Route::get('/',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',function(){
    return redirect('/');
});

Route::get('/',[AuthController::class,'loadLogin']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout']);
