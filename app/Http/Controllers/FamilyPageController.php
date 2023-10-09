<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyPage; 

class FamilyPageController extends Controller
{
    public function index()
    {
        $family_pages = FamilyPage::all(); // データベースから全ての手続きページを取得
        return view('family_pages.index', ['family_pages' => $family_pages]);
    }
    public function store(Request $request)
    {  
    // リクエストデータのバリデーション（必要に応じて）
    $request->validate([
        'inheritor_name' => 'required|string|max:255',
        'deceased_date' => 'required|date',
    ]);

    // データの保存
    $familyPage = new FamilyPage;
    $familyPage->inheritor_name = $request->input('inheritor_name');
    $familyPage->deceased_date = $request->input('deceased_date');
    $familyPage->save();

        return redirect()->route('family_pages.index'); // 保存後のリダイレクト先
    }

    // 診断スタート
    public function startDiagnoses() {
        return view('diagnoses.start');
    }

    public function show($id)
    {
        $familyPage = FamilyPage::findOrFail($id); // idに対応する手続きページを取得
        return view('family_pages.show', ['familyPage' => $familyPage]);
    }

}
