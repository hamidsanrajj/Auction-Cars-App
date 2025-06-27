<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\controllers\AdminController;
use App\HTTP\controllers\HomeController;
use App\HTTP\controllers\MainController;
use App\HTTP\controllers\BidController;
use App\HTTP\controllers\SearchController;
// use App\HTTP\controllers\SubscribeController;


// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[MainController::class, 'index'])->name('home');

Route::get('/admin',[AdminController::class, 'showDashboard'])->name('admin');

Route::get('/admin-login', [AdminController::class, 'showLoginForm']);
Route::post('/admin-login', [AdminController::class, 'login'])->name('adminLogin');
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('adminLogout');

Route::get('/admin-add-car',[AdminController::class, 'addCar'])->name('addCar');
Route::get('/admin-add-bid',[AdminController::class, 'addBid'])->name('addBid');
Route::get('/admin-add-user',[AdminController::class, 'addUser'])->name('addUser');

Route::get('/admin-add-car-to-bid',[AdminController::class, 'adminAddCar']);
Route::post('/admin-add-car-to-bid',[AdminController::class, 'adminAddCar'])->name('adminAddCar');

Route::view('/how-it-works','how-it-works')->name('howItWorks');

Route::get('/detail',[HomeController::class, 'detail'])->name('detail');
Route::get('/bid',[HomeController::class, 'bid'])->name('bid');
// Route::get('/bid',[HomeController::class, 'bid_amount'])->name('bid_amount');

Route::get('/bidding',[BidController::class, 'index']);
Route::post('/bidding',[BidController::class, 'bidding'])->name('bidding');

//search
// Route::get('/search', [SearchController::class, 'search']);
// Route::post('/search', [SearchController::class, 'search_store']);

Route::view('/register','/register')->name('register');
Route::view('/login','/login')->name('login');

Route::view('/bid-complete','/bid-complete');

Route::get('/search-result',[SearchController::class, 'search']);

// Route::get('/subscribe', [SubscribeController::class, 'index'])->name('subscribe');
// Route::post('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('logged-in');
