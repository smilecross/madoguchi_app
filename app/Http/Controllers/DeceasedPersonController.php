<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeceasedPerson; 
use App\Models\FamilyPage;

class DeceasedPersonController extends Controller
{
     public function index()
    {
        // ここでデータを取得したり、前処理を行ったりします。
        $procedure_pages = ProcedurePage::all();
        return view('deceased_persons.index',compact('procedure_pages')); // 適切なビューファイルに変更してください
    }

    public function create()
    {
        return view('deceased_persons.create'); // 適切なビューファイルに変更してください
    }

    public function store(Request $request)
    {  
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'death_date' => 'required|date',
        ]);

    $deceasedPerson = new DeceasedPerson([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'death_date' => $request->input('death_date'),
        ]);

    $deceasedPerson->save();
    // DeceasedPersonの作成後にFamilyPageも作成
        $familyPage = new FamilyPage();
        $familyPage->deceased_person_id = $deceasedPerson->id;
    // 必要に応じて他のデータもセット
        $familyPage->save();
    // 保存した FamilyPage の ID をセッションに保存
        session(['family_page_id' => $familyPage->id]);

        //手続きページの一覧画面へリダイレクト
        return redirect()->route('family_pages.show', $familyPage->id);
    }
    
}
