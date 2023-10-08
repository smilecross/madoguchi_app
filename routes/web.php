<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DeceasedPersonController;
use App\Http\Controllers\FamilyPageController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\InviteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ManualTaskController;



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
  Route::resource('deceased_persons', DeceasedPersonController::class); //相続手続きページ生成
  Route::resource('family_pages', FamilyPageController::class);
  
  Route::name('family_pages.chat.index')->get('family_pages/{family_page_id}/chat', [ChatController::class, 'index']); //一覧
  Route::name('family_pages.chat.store')->post('family_pages/{family_page_id}/chat', [ChatController::class, 'store']); //投稿

  Route::get('/dashboard', function () {
      return view('dashboard');
  })->name('dashboard');
  // Route::get('diagnosis/showResults/{id}', 'DiagnosisController@showResults')->name('diagnosis.showResults');
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  // Route::get('family_pages/diagnosis/start', [FamilyPageController::class, 'startDiagnosis'])->name('family_pages.diagnosis.start');
  Route::get('/tasks/{location}', [TaskController::class, 'filterByLocation'])->name('tasks.filter'); //簡易診断

  // マニュアルタスク
  Route::get('/manual-tasks', [ManualTaskController::class, 'index'])->name('manual-tasks.index');
  Route::post('/manual-tasks', [ManualTaskController::class, 'store'])->name('manual-tasks.store');
  Route::delete('/manual-tasks/{id}', [ManualTaskController::class, 'destroy'])->name('manual-tasks.destroy');
  Route::delete('/manual-tasks/destroy-all', [ManualTaskController::class, 'destroyAll'])->name('manual-tasks.destroyAll'); //全削除


  // 質問ページへのルーティング
  // Route::get('/procedure/diagnosis/profile', [DiagnosisController::class, 'profile'])->name('diagnosis.profile');
  // Route::get('/procedure/diagnosis/job_admin', [DiagnosisController::class, 'jobAdmin'])->name('diagnosis.jobAdmin');
  // Route::get('/procedure/diagnosis/estate', [DiagnosisController::class, 'estate'])->name('diagnosis.estate');
  // Route::get('/procedure/diagnosis/financial', [DiagnosisController::class, 'financial'])->name('diagnosis.financial');
  // Route::get('/procedure/diagnosis/other', [DiagnosisController::class, 'other'])->name('diagnosis.other');

  // 診断を実行するためのルーティング
  // Route::get('/diagnosis/start', [FamilyPageController::class, 'startDiagnosis'])->name('diagnosis.start');
  //Route::get('/diagnosis/results', [DiagnosisController::class, 'showResults']);
  

  // 回答の保存のためのルーティング 
  // Route::post('/procedure/diagnosis/store', [DiagnosisController::class, 'store'])->name('diagnosis.store');
});


  // 招待の受け入れ
  Route::get('invitation/accept/{token}', [InviteController::class, 'acceptInvitation'])->name('invitation.accept');
  
  // 招待メールの送信
  Route::get('/invite', function () {
    return view('invite');
})->name('invite');

  // Route::post('/send-invite',  [App\Http\Controllers\InviteController::class, 'sendInvitation'])->name('send.invite');
  Route::post('/send-invite', [InviteController::class, 'sendInvitation'])->name('send.invite');

require __DIR__.'/auth.php';
