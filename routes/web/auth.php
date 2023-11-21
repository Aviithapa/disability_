<?php


// Authentication Routes...
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login',  [LoginController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->middleware(['guest'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// $this->get('register/success', 'Auth\RegisterController@success')->name('register.success');
// $this->get('register/{role}', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register/{role}', 'Auth\RegisterController@registerNew');


// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');
