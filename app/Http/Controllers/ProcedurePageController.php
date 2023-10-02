<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProcedurePage;
use App\Models\FamilyPage;

class ProcedurePageController extends Controller
{
     public function index()
    {
        // ここでデータを取得したり、前処理を行ったりします。
        $procedure_pages = ProcedurePage::all();
        return view('procedure_pages.index',compact('procedure_pages')); // 適切なビューファイルに変更してください
    }

    public function create()
    {
        return view('procedure_pages.create'); // 適切なビューファイルに変更してください
    }

    public function store(Request $request)
    {  
        //新しい手続きページのインスタンスを作成
        $familyPage = new FamilyPage;

        //リクエストからデータを取得してモデルの属性に設定
        $familyPage->inheritor_name = $request->input('inheritor_name');
        $familyPage->deceased_date = $request->input('deceased_date'); 
        // データベースに保存
        $familyPage->save();

        //手続きページの一覧画面へリダイレクト
        return redirect()->route('family_pages.index');
    }
    
}
