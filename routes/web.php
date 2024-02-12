<?php
use App\Http\Controllers\VendorDisplayController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

////////////ADMIN SIDE/////////////
Route::get('/admin/dashboard', function () {
    return view('/admin/dashboard');
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

////////////LOGIN REGISTER SIDE/////////////
Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});





