<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckFamilyPageAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ファミリーページのIDを取得
        $familyPageId = $request->route('id');

        // ユーザーがログインしているかと、該当するファミリーページにアクセス権があるかをチェック
        if (Auth::check() && Auth::user()->familyPages->contains($familyPageId)) {
            return $next($request);
        }

        // アクセス権がない場合は、403エラーページを返すか、別の適切なレスポンスを返す
        return redirect()->route('dashboard')->with('noAccessToFamilyPage', true);
    }
}
