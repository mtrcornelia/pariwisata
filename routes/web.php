<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventFrontendController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TourFrontendController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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



Route::resource('home',DashboardController::class);

Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('/frontend-category/{id}', [FrontendController::class, 'showByCategory'])->name('frontend-category.show');
Route::get('/frontend-category', [FrontendController::class, 'showTourAll'])->name('frontend-all.show');

Route::get('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class,'logout']);
Route::post('/login', [LoginController::class,'authenticate']);
Route::resource('register',UserController::class);

Route::resource('tour-frontend',TourFrontendController::class);
Route::post('/tour/{id}/like', [TourFrontendController::class, 'likeTour'])->name('tour.like');

Route::resource('event-frontend',EventFrontendController::class);


Route::get('/email/verify', function () {
    return view('backend.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::resource('category',CategoryController::class);
// categori 

Route::resource('tour',TourController::class);
Route::resource('facility',FacilityController::class);
Route::resource('event',EventController::class);
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/create', [ContactController::class, 'store']);
Route::get('/contact/dashboard', [ContactController::class, 'dashboard']);