<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InviteController extends Controller
{
    // ... 既存のsendInvitation関数 ...

    public function acceptInvitation($token)
    {
        // トークンを使用して招待を検索
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return redirect('/')->withErrors(['招待が見つかりません。']);
        }

        // 既に招待が受け入れられたか、期限切れの場合はエラー
        if ($invitation->status !== 'unread') {
            return redirect('/')->withErrors(['この招待は既に受け入れられているか、期限切れです。']);
        }

        // ユーザーをログインさせる（もしくは登録する）ためのロジックを追加
        // Auth::login($user); のようなコード

        // 招待のステータスを更新
        $invitation->update(['status' => 'joined']);

        return redirect('/home')->with('success', '招待を受け入れました！');
    }
}
