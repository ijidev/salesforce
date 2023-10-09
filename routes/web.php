<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

// Route::get('/TC', [App\Http\Controllers\HomeController::class, 'term'])->name('term');
// Route::post('/log-in', [LoginController::class, 'login'])->name('loggin');

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home');
        Route::get('/checkin', 'checkin')->name('checkin');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/optimize', 'start')->name('start');
        Route::get('/review/{id}', 'review')->name('submit.review');
        Route::get('/get-Stated', 'getstarted')->name('getstarted');
        Route::get('/deposit/{id}', 'deposit')->name('deposit');
        Route::post('/complete-deposit/{id}', 'confirmDeposit')->name('confirm.deposit');
    
        Route::get('/tier', 'tier')->name('membership');
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/update', 'update')->name('user.store');
        
        Route::get('/info', 'info')->name('info');
        Route::get('/add-info', 'AddInfo')->name('info.add');
        Route::get('/update-info/{id}', 'StoreInfo')->name('info.store');
        Route::get('/delete-info/{id}', 'RemoveInfo')->name('info.remove');
        Route::get('/edit-info/{id}', 'EditInfo')->name('info.edit');
    
        Route::get('/withdraw', 'withdraw')->name('withdraw');
        Route::get('/withdraw-pass', 'withdrawPas')->name('withdraw.pas');
        Route::get('/withdraw-request', 'request')->name('request.withdraw');
        Route::get('/history', 'history')->name('history');
    
        Route::get('/contact-us', 'contact')->name('contact');
        Route::get('/notification', 'notify')->name('notify');

        Route::get('/records', 'record')->name('record');
        Route::get('/completed-records', 'completedRecord')->name('record.completed');
        Route::get('/frozen-records', 'frozenRecord')->name('record.frozen');
        Route::get('/pending-records', 'pendingRecord')->name('record.pending');
    }); 

    Route::controller(LoginController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logou');
        Route::Post('/create', 'ctrate')->name('registe');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin', 'index')->name('admin');

        Route::get('/admin/membership', 'plans')->name('plans');
        Route::post('/admin/create-plan', 'addplan')->name('add.plan');
        Route::get('/admin/edit-plan/{id}', 'Editplan')->name('edit.plan');
        Route::get('/admin/store-plan/{id}', 'updateplan')->name('store.plan');

        Route::get('/admin/user/{id}', 'user')->name('user');
        Route::get('/admin/user/update/{id}', 'updateUser')->name('user.update');
        Route::get('/admin/user/reset/{id}', 'resetUser')->name('reset');
        Route::get('/admin/user/delete/{id}', 'delete')->name('delete.user');
        Route::get('/admin/users', 'users')->name('users');
        Route::get('/admin/users/fund/{id}', 'fund')->name('manage.funds');
        
        Route::get('/admin/apps', 'apps')->name('apps');
        Route::post('/admin/update-app/{id}', 'updateApp')->name('app.update');
        Route::get('/admin/delete-app/{id}', 'deleteApp')->name('app.delete');
        Route::get('/admin/edit-app/{id}', 'editApp')->name('app.edit');
        Route::post('/admin/store-app', 'storeApp')->name('app.store');
        
        Route::get('/admin/app-reviwe', 'appReview')->name('app.review');
        Route::get('/admin/approve-reviwe/{id}', 'approveReview')->name('review.approve');
        Route::get('/admin/edit-reviwe/{id}', 'editReview')->name('review.edit');

        Route::get('/admin/app-submit/{id} ', 'appSubmit')->name('app.submit');

        Route::get('/admin/faq', 'faq')->name('faq');
        Route::get('/admin/add-faq', 'addfaq')->name('add.faq');
        Route::get('/admin/update-faq/{id}', 'updatefaq')->name('update.faq');
        Route::get('/admin/edit-faq/{id}', 'editfaq')->name('edit.faq');
        Route::get('/admin/delete-faq/{id}', 'deletefaq')->name('delete.faq');

        // Route::get('/admin/terms', 'term')->name('terms');
        Route::get('/admin/settings', 'settings')->name('settings');
        Route::get('/admin/settings-update', 'updateSetting')->name('settings.update');

        Route::get('/admin/withwdrawal', 'withdraw')->name('withdrawa.request');
        Route::get('/admin/approve-withwdrawal/{id}', 'approve')->name('approve');
        Route::get('/admin/decline-withwdrawal/{id}', 'decline')->name('decline');

        Route::get('/admin/deposit', 'deposit')->name('deposit.request');
        Route::get('/admin/view-deposit/{id}', 'viewDeposit')->name('view.deposit');
        Route::get('/admin/update-deposit/{id}', 'approveDeposit')->name('approve.deposit');
    });
});

// Route::controller(HomeController::class)->group(function () {
    // Route::get('/T&C', 'HomeController@term')->name('term');
// });
