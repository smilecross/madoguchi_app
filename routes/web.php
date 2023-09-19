<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProcedurePageController;
use App\Http\Controllers\FamilyPageController;
// use App\Http\Controllers\FavoriteController;

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

// Route::middleware(['web'])->resource('chat', ChatController::class);

Route::middleware('auth')->group(function () {
  Route::resource('family_pages', FamilyPageController::class);
  Route::resource('family_pages/chat', ChatController::class);
  Route::resource('procedure_pages', ProcedurePageController::class);
  
});
Route::get('/', function () {
    return view('welcome');
});

// Route::get('family_pages', [FamilyPageController::class, 'index'])->name('family_pages.index');
// Route::get('family_pages/create', [FamilyPageController::class, 'create'])->name('family_pages.create');

Route::name('family_pages.chat.index')->get('family_pages/chat', [ChatController::class, 'index']);
Route::name('family_pages.chat.create')->get('family_pages/chat/create', [ChatController::class, 'create']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// 招待の受け入れ
Route::get('invitation/accept/{token}', [App\Http\Controllers\InviteController::class, 'acceptInvitation'])->name('invitation.accept');

// 招待メールの送信
Route::get('/invite', function () {
    return view('invite');
})->name('invite');
// Route::post('/send-invite',  [App\Http\Controllers\InviteController::class, 'sendInvitation'])->name('send.invite');
Route::post('/send-invite', 'InviteController@sendInvitation')->name('send.invite');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
