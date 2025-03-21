<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function ($e) {
    Route::get('/', function () {
        return redirect('/extraweb/login');
    });
    
    Route::group(['prefix' => 'extraweb'], function ($e) {
        Route::get('/', 'App\Http\Controllers\Backend\UserController@login')->name('extraweb.login');
        Route::get('/login', 'App\Http\Controllers\Backend\UserController@login')->name('extraweb.login2');
        Route::get('/logout', 'App\Http\Controllers\Backend\UserController@logout')->name('extraweb.logout');
        Route::get('/forgot-password', 'App\Http\Controllers\Backend\AuthController@forgot_password')->name('extraweb.forgot_password');
        Route::get('/register', 'App\Http\Controllers\Backend\AuthController@register')->name('extraweb.register');
        
        
    });
});