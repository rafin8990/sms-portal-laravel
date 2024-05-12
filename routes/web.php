<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\AddContactController;
use App\Http\Controllers\Backend\AddMessageController;
use App\Http\Controllers\backend\AddSMSController;
use App\Http\Controllers\Backend\AddUserController;
use App\Http\Controllers\Backend\DeleteContactController;
use App\Http\Controllers\Backend\SendSMSController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('user');
    Route::get('/send-message', [SendSMSController::class, 'sendMessageForm'])->name('send.Message')->middleware('user');
    Route::post('/forward-message',[SendSMSController::class,'getContact'])->name('get.contact')->middleware('user');

    Route::get('/add-contact', [AddContactController::class, 'AddContactForm'])->name('addContact')->middleware('user');
    Route::post('/post-contact', [AddContactController::class, 'PostContact'])->name('post.contact')->middleware('user');
    Route::get('/blank-excel-download',[AddContactController::class,'DownloadBlankExcel'])->name('download.contact')->middleware('user');
    Route::post('/upload-excel',[AddContactController::class,'uploadExcel'])->name('upload.contact')->middleware('user');
    Route::get('/delete-contact-table',[DeleteContactController::class,'DeleteTable'])->name('delete.contact.table')->middleware('user');
    Route::delete('/delete-contact/{id}',[DeleteContactController::class,'deleteContact'])->name('delete.contact')->middleware('user');
    Route::delete('/delete-multiple-contacts', [DeleteContactController::class, 'deleteMultipleContacts'])->name('delete.multiple.contacts')->middleware('user');


    Route::get('/view-bangla-message', [AddMessageController::class, 'ViewBanglaMessageForm'])->name('banglaMessage')->middleware('user');
    Route::get('/view-eng-message', [AddMessageController::class, 'ViewEngMessageForm'])->name('engMessage')->middleware('user');
    Route::post('/post-message', [AddMessageController::class, 'PostMessage'])->name('post.message')->middleware('user');

    Route::post('login-user',[AuthController::class,'LoginUser'])->name("login.user");


    Route::get('/addUserForm',[AddUserController::class,'addUserForm'])->name('addUserForm')->middleware('admin');
    Route::post('add-user',[AddUserController::class,'postUser'])->name("postUser")->middleware('admin');
    Route::get('/add-sms',[AddSMSController::class,"addSms"])->name("add.sms")->middleware('admin');
    Route::put('/update-user',[AddSMSController::class,'updateUserSMS'])->name('update.user')->middleware('admin');
    

});
