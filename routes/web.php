<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\TwilioSMSController;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

    Route::get('/', function () {
       return view('auth/login');
    });

    Auth::routes();
     Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('about', [HomeController::class, 'about'])->name('about');

    Route::resource('contact', ContactController::class);

    Route::get('/languageDemo', 'App\Http\Controllers\HomeController@languageDemo');


    Route::get('event-registration',[OrderController::class, 'register']);

    Route::post('payment', [OrderController::class, 'order']); 


    Route::get('stripe',[StripePaymentController::class, 'stripe']);
    Route::post('stripe',[StripePaymentController::class, 'stripePost'])->name('stripe.post');


    Route::get('sendSMS', [TwilioSMSController::class, 'index']);


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // Artisan::call('view:cache');
    Artisan::call('route:clear');
    // Artisan::call('route:cache');


    return "Cleared!";
});
    
});


