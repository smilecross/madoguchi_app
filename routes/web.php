<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProcedurePageController;
use App\Http\Controllers\FamilyPageController;
use App\Http\Controllers\DiagnosisController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
  Route::resource('family_pages', FamilyPageController::class);
  Route::resource('family_pages/chat', ChatController::class);
  Route::resource('procedure_pages', ProcedurePageController::class);

  Route::name('family_pages.chat.index')->get('family_pages/chat', [ChatController::class, 'index']);
  Route::name('family_pages.chat.create')->get('family_pages/chat/create', [ChatController::class, 'create']);

  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('family_pages/diagnosis/start', [FamilyPageController::class, 'startDiagnosis'])->name('family_pages.diagnosis.start');

  // 質問ページへのルーティング
  Route::get('/procedure/diagnosis/profile', 'DiagnosisController@profile')->name('diagnosis.profile');
  // Route::get('/diagnosis/start', 'DiagnosisController@profile')->name('diagnosis.start');
  Route::get('/procedure/diagnosis/profile', 'DiagnosisController@profile')->name('diagnosis.profile');
  Route::get('/procedure/diagnosis/job_admin', 'DiagnosisController@jobAdmin')->name('diagnosis.jobAdmin');
  Route::get('/procedure/diagnosis/estate', 'DiagnosisController@estate')->name('diagnosis.estate');
  Route::get('/procedure/diagnosis/financial', 'DiagnosisController@financial')->name('diagnosis.financial');
  Route::get('/procedure/diagnosis/other', 'DiagnosisController@other')->name('diagnosis.other');

  // 診断を実行するためのルーティング
  Route::get('/diagnosis/start', [FamilyPagesController::class, 'startDiagnosis'])->name('diagnosis.start');

  // 回答の保存のためのルーティング
  Route::post('/procedure/diagnosis/store', 'DiagnosisController@store')->name('diagnosis.store');
});

  // 招待の受け入れ
  Route::get('invitation/accept/{token}', [App\Http\Controllers\InviteController::class, 'acceptInvitation'])->name('invitation.accept');
  
  // 招待メールの送信
  Route::get('/invite', function () {
    return view('invite');
  })->name('invite');

  // Route::post('/send-invite',  [App\Http\Controllers\InviteController::class, 'sendInvitation'])->name('send.invite');
  Route::post('/send-invite', 'InviteController@sendInvitation')->name('send.invite');


require __DIR__.'/auth.php';
