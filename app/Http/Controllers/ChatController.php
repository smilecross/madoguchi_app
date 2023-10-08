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
    public function index($family_page_id)
    {
        $chats = Chat::where('family_page_id', $family_page_id)->orderBy('updated_at', 'desc')->get();
        return response()->view('family_page.chat.index', compact('chats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $family_page_id)
    {
         // バリデーション
        $validator = Validator::make($request->all(), [
            'message' => 'required | max:191',
        ]);

        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('family_page.chat.create', ['family_page_id' => $family_page_id])
            ->withInput()
            ->withErrors($validator);
        }
       
        // データのマージ
          $data = $request->merge([
            'user_id' => Auth::user()->id,
            'family_page_id' => $family_page_id
            ])->all();

        //メッセージの保存
          $result = Chat::create($data);

        // ルーティング「chat.index」に
        return redirect()->route('family_page.chat.index', ['family_page_id' => $family_page_id]);  
    }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $family_page_id, $id)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'message' => 'required | max:191',
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('chat.edit', ['family_page_id' => $family_page_id, 'id' => $id])
            ->withInput()
            ->withErrors($validator);
        }
        //データ更新処理
        $result = Chat::find($id)->update($request->all());
        return redirect()->route('family_page.chat.index', ['family_page_id' => $family_page_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($family_page_id, $id)
    {
        $result = Chat::find($id)->delete();
        return redirect()->route('family_page.chat.index', ['family_page_id' => $family_page_id]);
    }
}
