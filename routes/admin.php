<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('isAdmin')->group(function(){
        Route::view('index','admin.index')->name('index');
        Route::resource('category',CategoryController::class);

    });
    require __DIR__.'/admin_auth.php';

});

