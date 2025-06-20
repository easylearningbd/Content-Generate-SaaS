<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\PlanController;
use App\Http\Controllers\Backend\Admin\TemplateController;
use App\Http\Controllers\Backend\Admin\DocumentController;
use App\Http\Controllers\Backend\Admin\ChatController;

use App\Http\Controllers\Backend\Client\UserController;
use App\Http\Controllers\Backend\Client\UserTemplateController;
use App\Http\Controllers\Backend\Client\CheckoutController;

use App\Http\Controllers\Frontend\HomeController;

Route::get('/', function () {
    return view('home.index');
});


/// User Routes 
Route::middleware(['auth', IsUser::class])->group(function () {

Route::get('/dashboard', function () {
    return view('client.index');
})->name('dashboard');


 Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

  Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
  Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
  Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
  Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update'); 

Route::controller(UserTemplateController::class)->group(function(){
    Route::get('/user/template', 'UserTemplate')->name('user.template'); 
    Route::get('/user/details/template/{id}', 'UserDetailsTemplate')->name('user.details.template');
    Route::post('/user/content/generate/{id}', 'UserContentGenerate')->name('user.content.generate');

    Route::get('/user/document', 'UserDocument')->name('user.document');
    Route::get('/edit/user/document/{id}', 'EditUserDocument')->name('edit.user.document'); 
    Route::post('/user/update/document/{id}', 'UserUpdateDocument')->name('user.update.document');
    Route::get('/delete/user/document/{id}', 'DeleteUserDocument')->name('delete.user.document');
    
  });


Route::controller(CheckoutController::class)->group(function(){
    Route::get('/user/checkout', 'UserCheckout')->name('user.checkout');
    Route::post('/user/process/checkout', 'UserProcessCheckout')->name('user.process.checkout'); 
    Route::get('/payment/success', 'PaymentSuccess')->name('payment.success');
    Route::get('/invoice/generate/{id}', 'InvoiceGenerate')->name('invoice.generate');
   
    
  });



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
    Route::post('/update/template/{id}', 'UpdateTemplate')->name('update.template'); 

    Route::get('/details/template/{id}', 'DetailsTemplate')->name('details.template');

    Route::post('/content/generate/{id}', 'AdminContentGenerate')->name('content.generate'); 
    
  });


  Route::controller(DocumentController::class)->group(function(){
    Route::get('/admin/document', 'AdminDocument')->name('admin.document');
    Route::get('/edit/admin/document/{id}', 'EditAdminDocument')->name('edit.admin.document'); 
    Route::post('/admin/update/document/{id}', 'AdminUpdateDocument')->name('admin.update.document'); 
    Route::get('/delete/admin/document/{id}', 'DeleteAdminDocument')->name('delete.admin.document');
     
  });

  Route::controller(AdminController::class)->group(function(){
    Route::get('/all/orders', 'AllOrders')->name('all.orders'); 
    Route::get('/update/order/status/{id}', 'UpdateOrderStatus')->name('update.order.status'); 
     
  });

   Route::controller(ChatController::class)->group(function(){
    Route::get('/all/assistants', 'AllAssistants')->name('all.assistants');
    Route::get('/add/assistants', 'AddAssistants')->name('add.assistants'); 
    Route::post('/chat-assistants/store', 'StoreAssistants')->name('chat-assistants.store'); 

    Route::get('/chat-assistants/chat/{assistantId}', 'ChatAssistants')->name('chat-assistants.chat');
    Route::post('/chat-assistants/send/{assistantId}', 'ChatSendMessage')->name('chat-assistants.send');
    Route::get('/chat-assistants/new/{assistantId}', 'StartNewConversation')->name('chat-assistants.new');
    Route::get('/chat-assistants/{assistantId}/conversation/{conversationId}', 'SelecteConversation')->name('chat-assistants.select');
    
     
  });



Route::controller(HomeController::class)->group(function(){
    Route::get('/home/slider', 'HomeSlider')->name('home.slider'); 
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    
  });

  Route::controller(HomeController::class)->group(function(){
    Route::get('/all/heading', 'AllHeading')->name('all.heading'); 
    Route::get('/add/heading', 'AddHeading')->name('add.heading');
    Route::post('/store/heading', 'StoreHeading')->name('store.heading'); 
     
  });

   Route::controller(HomeController::class)->group(function(){
    Route::get('/all/questions', 'AllQuestions')->name('all.questions'); 
    Route::get('/add/questions', 'AddQuestions')->name('add.questions');
    Route::post('/store/questions', 'StoreQuestions')->name('store.questions'); 
     
  });



});
/// End Admin Routes 


/////////// Assess for All ///////////////////
 Route::post('/update-slider/{id}', [HomeController::class, 'UpdateSliders']);
 Route::post('/update-slider-image/{id}', [HomeController::class, 'UpdateSliderImage']);
 

  Route::controller(HomeController::class)->group(function(){
    Route::post('/update-started/{id}', 'UpdateStarted'); 
   
    
    
  });






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
