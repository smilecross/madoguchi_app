<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Chat;
use Auth;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chat::getAllOrderByUpdated_at();
        return response()->view('family_page.chat.index',compact('chats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('family_page.chat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // バリデーション
        $validator = Validator::make($request->all(), [
            'chat' => 'required | max:191',
            'description' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('family_pay.chat.create')
            ->withInput()
            ->withErrors($validator);
        }
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        // $result = Chat::create($date);
          $result = Chat::create($request->all());
        // ルーティング「chat.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('family_pay.chat.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $chat = Chat::find($id);
        return response()->view('family_pay.chat.show', compact('chat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chat = Chat::find($id);
        return response()->view('family_pay.chat.edit', compact('chat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'chat' => 'required | max:191',
            'description' => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('chat.edit', $id)
            ->withInput()
            ->withErrors($validator);
        }
        //データ更新処理
        $result = Chat::find($id)->update($request->all());
        return redirect()->route('family_pay.chat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = Chat::find($id)->delete();
        return redirect()->route('family_pay.chat.index');
    }
}
