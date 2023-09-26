<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;


class DiagnosisController extends Controller
{
    public function profile()
    {
        return view('procedure.diagnosis.profile');
        // return vew('diagnosis.start');
    }

    public function jobAdmin()
    {
        return view('procedure.diagnosis.jobAdmin');
    }

    public function estate()
    {
        return view('procedure.diagnosis.estate');
    }

    public function financial()
    {
        return view('procedure.diagnosis.financial');
    }

    public function other()
    {
        return view('procedure.diagnosis.other');
    }

    public function store(Request $request)
    {
        // ユーザーの回答や診断結果をデータベースに保存するロジック
        $data = $request->all();

        // バリデーションやデータの整形を必要に応じて実施
    
        // diagnosisテーブルにデータを保存
        Diagnosis::create($data);

        // 全ての回答が終わったら結果ページや次のページへリダイレクトする
        return redirect()->route('next.page.or.result');
    }

}
