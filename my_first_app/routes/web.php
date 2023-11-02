<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController; // Import the AdminController

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Protected Student Listing Page
Route::middleware(['auth'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    
    // Routes for Admin Users
    Route::middleware(['admin'])->group(function () {
        // Define the route for making a user admin
        Route::post('/users/{user}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
    });
});
Route::get('/students/{student}/edit', 'StudentController@edit')->name('students.edit');
Route::put('/students/{student}', 'StudentController@update')->name('students.update');
Route::delete('/students/{student}', 'StudentController@destroy')->name('students.destroy');
