<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\accountController;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use App\Http\Middleware\RedirectIfAuthenticated;

// Public routes
Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/jobs', [jobController::class, 'index'])->name('jobs'); 
Route::get('/jobs/detail/{id}', [jobController::class, 'jobDetail'])->name('jobDetail');

Route::post('/account/authenticate', [accountController::class, 'authenticate'])->name('account.authenticate');
Route::get('/account.register', [accountController::class, 'registration'])->name('account.registration');
Route::post('/account/process-register', [accountController::class, 'processregistration'])->name('account.processRegistration');

Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/account/login', [accountController::class, 'login'])->name('account.login');
});
   
Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
   Route::get('/account/profile', [accountController::class, 'profile'])->name('account.profile');
    Route::post('/account/updateProfile', [accountController::class, 'updateProfile'])->name('account.updateProfile');
    Route::get('/account/logout', [accountController::class, 'logout'])->name('account.logout');
    Route::post('/account/updateProfilePic', [accountController::class, 'updateProfilePic'])->name('account.updateProfilePic');
    Route::get('/account/job/create', [accountController::class, 'createJob'])->name('account.jobCreate');
    Route::post('/saveJob', [accountController::class, 'saveJob'])->name('account.saveJob');
    Route::get('/my-jobs', [accountController::class, 'myJobs'])->name('account.myJobs');
    Route::delete('/delete-job/{id}', [accountController::class, 'deleteJob'])->name('account.deleteJob');

});