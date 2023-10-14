<?php

namespace App\Http\Controllers;

use App\Models\Invite; 
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InviteController extends Controller
{
    public function sendInvitation(Request $request)
    {
        if(!session()->has('family_page_id')) {
            return redirect()->back()->withErrors(['エラーが発生しました。再度お試しください。']);
        }      

        $request->validate(['email' => 'required|email']);

        $existingInvite = Invite::where('email', $request->email)->first();
        
        if ($existingInvite) {
            return redirect()->back()->with('error', 'このメールアドレスへの招待は既に送信されています。');
        }

        $invite = new Invite();
        $invite->email = $request->email;
        $invite->token = Str::random(32);
        $invite->family_page_id = session('family_page_id', null);
        $invite->save();

        $inviteUrl = '/invitation/accept/' . $invite->token;
        \Log::info('Generated Invite URL:', ['url' => $inviteUrl]);
        $companyName = 'LifeMoneyTech かぞくの窓口';  
        $inviter = Auth::user(); // これが招待を送った人

        Mail::to($request->email)->send(new InvitationMail($inviteUrl, $inviter, $invite->family_page_id));

        return redirect()->back()->with('success', '招待を送信しました！');
    }

    public function acceptInvitation($token)
    {
        \Log::info('Step 1: Checking the token...'); // ログ追加
        $invite = Invite::where('token', $token)->first();

        if (!$invite) {
            return redirect('/')->withErrors(['招待は無効または期限切れです。']);
        }

        // ユーザーがログインしているか確認
        if (!Auth::check()) {
            // ユーザーがログインしていない場合、新規登録/ログインページにリダイレクト
            session(['invite_token' => $token]);
            return redirect()->route('register')->with('info', 'アカウントを作成またはログインしてください。');
        }

        // ログインしているユーザーにファミリーページへのアクセス権限を付与
        $user = Auth::user();
        $user->familyPages()->attach($invite->family_page_id); // ここはあなたのデータベースの設計に基づいて変更する必要があります

        // ファミリーページにリダイレクト
        // return redirect()->route('family_pages.show', ['id' => $invite->family_page_id])->with('success', 'ファミリーページに参加しました！');
        return redirect()->route('family_pages.show', ['family_page' => $invite->family_page_id])->with('success', 'ファミリーページに参加しました！');

    }

         public function handleUserInvitation(User $user): bool
        {
            $inviteToken = session('invite_token');
            if ($inviteToken) {
                $invite = Invite::where('token', $inviteToken)->first();
                if ($invite) {
                    $user->familyPages()->attach($invite->family_page_id);
                    $invite->delete();
                    session()->forget('invite_token');  // セッションからトークンを削除

                    return true;  // 招待が正常に処理された
                }
            }

            return false;  // 招待トークンがない、または招待が正常に処理されなかった
        }



}
