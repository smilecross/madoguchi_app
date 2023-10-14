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
        $family_page = FamilyPage::find($id);

        if (!$family_page) {
            return redirect()->route('dashboard')
                ->with('Oops!!', 'ファミリーページがまだ作成されていません。');
        }

    // ある条件を満たしているかどうかのチェックロジックを$conditionに格納
        $condition = count($family_page->some_related_models ?? []) > 0; 

        return view('family_pages.show', ['familyPage' => $family_page]);
    }

}
