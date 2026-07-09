<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->prefix('/auth')->group(function(){
    Route::get('/register','index')->name('register.index');
    Route::post('/register','store')->name('register.store');

});
