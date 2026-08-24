<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\otpVerificationController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\blog;
use App\Http\Controllers\CityAmenityController;
use App\Http\Controllers\Dashboards\adminController;
use App\Http\Controllers\Dashboards\agentController;
use App\Http\Controllers\Dashboards\userController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ContactInquiryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Accessible by Everyone)
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/about', [PageController::class, 'about'])->name('page.about');
Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');
Route::get('/testimonials',[PageController::class,'reviews'])->name('testimonials.index');
Route::get('/privacyPolicy',[PageController::class,'privacyPolicy'])->name('page.privacyPolicy');
Route::get('/termsandConditions',[PageController::class,'termsandconditions'])->name('page.termsandconditions');

Route::get('/contact-us', [ContactInquiryController::class, 'create'])->name('contact.create');
Route::post('/contact-us', [ContactInquiryController::class, 'store'])->name('contact.store');

// Blog Pages
Route::controller(blog::class)->group(function () {
    Route::get('/blog', 'index')->name('blog.index');
    Route::get('/blog/title', 'show')->name('blog.show');
});

// Public Property Views & Search
Route::controller(PropertyController::class)->group(function () {
    Route::get('/properties', 'index')->name('property.index');
    Route::get('/properties/search', 'search')->name('property.search');
    Route::get('/properties/{id}', 'show')->name('property.show');
});

// Agent Public Profile View
Route::get('agent/profile/{id}/view', [agentController::class, 'show'])->name('agent.show');

// Fallback Route
Route::get('/notfound', function () {
    return 'not found';
})->name('error.index');

/*
|--------------------------------------------------------------------------
| Guest Routes (Unauthenticated Users Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Registration
    Route::controller(RegisterController::class)->prefix('auth')->group(function () {
        Route::get('/register', 'index')->name('register.index');
        Route::post('/register', 'store')->name('register.store');
    });

    // Login
    Route::controller(loginController::class)->prefix('auth')->group(function () {
        Route::get('/login', 'index')->name('login.index');
        Route::post('/login', 'store')->name('login.store');
    });
});

/*
|--------------------------------------------------------------------------
| OTP Verification Route (Authenticated, but pending verification)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->controller(otpVerificationController::class)->prefix('auth')->group(function () {
    Route::get('/verify', 'index')->name('otp.index');
    Route::post('/verify', 'verify')->name('otp.verify');
    Route::post('/resend', 'resend')->name('otp.resend');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Requires Authentication + Verification + Active Status)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Shared Profile Update Routes
    Route::put('user/dashboard/profile', [RegisterController::class, 'update'])->name('register.update');
    Route::put('/updatePassword', [RegisterController::class, 'updatePassword'])->name('register.update.password');

    /*
    |--------------------------------------------------------------------------
    | Buyer Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:buyer'])->prefix('user')->group(function () {
        Route::controller(userController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('user.index');
            Route::get('/dashboard/saved', 'saved')->name('user.saved');
            Route::post('/dashboard/review', 'review')->name('user.review');
            Route::get('/dashboard/profile', 'profile')->name('user.profile');
            Route::get('/dashboard/logout', 'destroy')->name('user.destroy');
        });

        // Buyer Save Property Action
        Route::post('/properties/{id}/save', [PropertyController::class, 'toggle'])->name('properties.save');

        // Buyer Appointments
        Route::controller(AppointmentController::class)->prefix('dashboard')->group(function () {
            Route::get('/appointments', 'appointments')->name('user.appointments');
            Route::get('/add/{id}/appointment', 'addAppointment')->name('user.addAppointment');
            Route::post('/add/appointment', 'create')->name('appointment.create');
            Route::get('/del/{id}', 'delete')->name('appointment.delete');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Agent Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:agent'])->prefix('agent')->group(function () {
        Route::controller(agentController::class)->prefix('dashboard')->group(function () {
            Route::get('/', 'index')->name('agent.index');
            Route::get('/properties', 'properties')->name('agent.properties');
            Route::get('/property/{id}', 'show')->name('agent.show');
            Route::get('/profile', 'profile')->name('agent.profile');
            Route::get('/logout', 'destroy')->name('agent.destroy');
        });

        // Agent Property Management
        Route::controller(PropertyController::class)->group(function () {
            Route::get('/dashboard/add', 'create')->name('property.create');
            Route::post('/dashboard/add', 'store')->name('properties.store');
            Route::get('/properties/{id}/edit', 'edit')->name('property.edit');
            Route::put('/properties/{id}/update', 'update')->name('property.update');
            Route::get('/properties/{id}/delete', 'destroy')->name('properties.destroy');
            Route::get('/properties/search', 'propsearch')->name('agent.propsearch');
        });

        // Agent Appointments
        Route::get('dashboard/appointments', [AppointmentController::class, 'agentAppointments'])->name('agent.appointments');
    });

    Route::patch('/agents/{agent}/toggle-feature', [AgentController::class, 'toggleFeature'])->name('admin.agents.toggle-feature');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::controller(adminController::class)->prefix('dashboard')->group(function () {
            Route::get('/', 'index')->name('admin.index');
            Route::get('/users', 'users')->name('admin.users');
            Route::get('/profile','profile')->name('admin.profile');
            Route::patch('/users/suspend/{id}', 'toggleStatus')->name('users.suspend');
            Route::patch('/users/update/{id}', 'updateRole')->name('users.updateRoles');
            Route::get('/agents', 'agents')->name('admin.agents');
            Route::get('/reviews', 'cms')->name('admin.cms');
            Route::patch('/review/{id}/toggle', 'toggleReview')->name('admin.review.toggle');
            Route::put('/review/{id}/approve', 'statusApprove')->name('admin.review.status');
            Route::delete('/review/{id}', 'destroyReview')->name('admin.review.delete');
            Route::get('/blogcms', 'blogcms')->name('admin.blogcms');
            Route::get('/property', 'property')->name('admin.property');
            Route::get('/logout', [UserController::class,'destroy'])->name('admin.destroy');

        });

        Route::get('/admin/inquiries', [ContactInquiryController::class, 'index'])->name('admin.inquiries.index');
        Route::get('/appointments',[AppointmentController::class,'getAppointment'])->name('admin.appointment');

        // Admin Property Moderation
        Route::patch('/properties/{id}/status', [PropertyController::class, 'updateStatus'])->name('admin.properties.updateStatus');
        Route::patch('/properties/{property}/feature', [PropertyController::class, 'toggleFeature'])->name('properties.feature');

        // City & Amenity Management
        Route::controller(CityAmenityController::class)->group(function () {
            Route::get('/amenities', 'index')->name('amenities.index');
            Route::post('/amenities', 'storeAmenity')->name('amenities.store');
            Route::put('/amenities/{amenity}', 'updateAmenity')->name('amenities.update');
            Route::delete('/amenities/{amenity}', 'destroyAmenity')->name('amenities.destroy');
            Route::post('/cities', 'storeCity')->name('cities.store');
            Route::delete('/cities/{city}', 'destroyCity')->name('cities.destroy');
        });
    });
 
    /*
    |--------------------------------------------------------------------------
    | Shared Protected Actions (Agents & Buyers / Multi-Role)
    |--------------------------------------------------------------------------
    */
    Route::patch('/appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])
        ->name('appointments.update-status');
});