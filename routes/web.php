<?php

use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\otpVerificationController;
use App\Http\Controllers\auth\forgetPasswordController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\blog;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Dashboards\userController;
use App\Http\Controllers\Dashboards\agentController;
use App\Http\Controllers\Dashboards\adminController;
use App\Http\Middleware\verifiedMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
/*
Register Controller
*/
Route::controller(RegisterController::class)->prefix('/auth')->group(function(){
    Route::get('/register','index')->name('register.index');
    Route::post('/register','store')->name('register.store');
    
    });
    
Route::controller(loginController::class)->prefix('/auth')->group(function(){
    Route::get('/login','index')->name('login.index');
    Route::post('/login','store')->name('login.store');
});
});
Route::controller(otpVerificationController::class)->prefix('/auth')->group(function(){
   Route::get('/verify','index')->name('otp.index');   
   Route::post('/verify','verify')->name('otp.verify');
   Route::post('/resend','resend')->name('otp.resend');
});

Route::controller(blog::class)->group(function(){
    Route::get('/blog','index')->name('blog.index');
    Route::get('/blog/title','show')->name('blog.show');
});
Route::controller(PropertyController::class)->group(function(){
    Route::get('/properties','index')->name('property.index');
    Route::get('/properties/{id}','show')->name('property.show');
    
    });
Route::middleware(['verified'])->group(function(){
Route::put('user/dashboard/profile', [RegisterController::class, 'update'])->name('register.update');
Route::middleware(['role:buyer'])->controller(userController::class)->prefix('user')->group(function(){
    Route::get('/dashboard','index')->name('user.index');
    Route::get('/dashboard/saved','saved')->name('user.saved');//for Saved Properties
    Route::get('/dashboard/appointments','appointments')->name('user.appointments'); // for user Appointments
    Route::get('/dashboard/inquiries','inquiries')->name('user.inquiries');
    Route::get('/dashboard/profile','profile')->name('user.profile');
    Route::delete('/dashboard/profile','destroy')->name('user.destroy');

});
Route::middleware(['role:admin'])->controller(adminController::class)->prefix('admin')->group(function(){
    Route::get('/dashboard','index')->name('admin.index');
});
Route::middleware(['role:agent'])->controller(agentController::class)->prefix('agent')->group(function(){
    Route::get('/dashboard','index')->name('agent.index'); // P
    Route::get('/dashboard/add','create')->name('agent.create'); // Add Property (single)
    Route::get('/dashboard/properties','properties')->name('agent.properties'); // All Properties
    Route::get('/dashboard/property/{id}','show')->name('agent.show'); // for showing Single Property
    Route::get('/dashboard/appointments','appointments')->name('agent.appointments'); // for APPOINTEMENTS
    Route::get('/dashboard/messages','messages')->name('agent.messages'); // for Messages
    Route::get('/dashboard/profile','profile')->name('agent.profile'); // for profile
    Route::post('/dashboard/add',[PropertyController::class,'store'])->name('properties.store');


});
});

Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get('/about',[PageController::class,'about'])->name('page.about'); 
Route::get('/contact',[PageController::class,'contact'])->name('page.contact'); 


Route::get('/notfound',function(){
    return 'not found';
})->name('error.index');