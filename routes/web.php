<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
    return view('home');
});

Route::post('/submit-data', [HomeController::class, 'store'])->name('submit.data');

Route::post('/contact', [HomeController::class, 'send'])->name('contact.send');

Route::get('/send-email', function () {
    Mail::raw('Ini adalah email testing!', function ($message) {
        $message->to('email_tujuan@example.com')
                ->subject('Testing Laravel Mail');
    });

    return 'Email berhasil dikirim!';
});
