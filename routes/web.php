<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\PlanController;
use App\Http\Controllers\Backend\Admin\TemplateController;

Route::get('/', function () {
    return view('welcome');
});


/// User Routes 
Route::middleware(['auth', IsUser::class])->group(function () {

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

});
/// Eend User Routes 


/// Admin Routes 
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {
    
Route::get('/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');


  Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
  Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
  Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

  Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
  Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');



  Route::controller(PlanController::class)->group(function(){
    Route::get('/all/plans', 'AllPlans')->name('all.plans'); 
    Route::get('/add/plans', 'AddPlans')->name('add.plans'); 
    Route::post('/store/plans', 'StorePlans')->name('store.plans'); 
    Route::get('/edit/plans/{id}', 'EditPlans')->name('edit.plans'); 
    Route::post('/update/plans', 'UpdatePlans')->name('update.plans');
    Route::get('/delete/plans/{id}', 'DeletePlans')->name('delete.plans'); 
  });


    Route::controller(TemplateController::class)->group(function(){
    Route::get('/admin/template', 'AdminTemplate')->name('admin.template'); 
    Route::get('/add/template', 'AddTemplate')->name('add.template'); 
    Route::post('/store/template', 'StoreTemplate')->name('store.template');

    Route::get('/edit/template/{id}', 'EditTemplate')->name('edit.template'); 
    
  });





});
/// End Admin Routes 
 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
