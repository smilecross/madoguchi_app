<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Invite; 
use App\Models\Invitation;
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

        $inviteUrl = 'https://madoguchi.sakura.ne.jp/project/invitation/accept/' . $invite->token;
        \Log::info('Generated Invite URL:', ['url' => $inviteUrl]);
        $companyName = 'LifeMoneyTech かぞくの窓口';  
        $inviter = Auth::user(); // これが招待を送った人

        Mail::to($request->email)->send(new InvitationMail($inviteUrl, $inviter, $invite->family_page_id));

        return redirect()->back()->with('success', '招待を送信しました！');
    }



}
