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
        // $data = $request->all();
        $diagnosis = Diagnosis::create($request->all());
        
        return redirect()->route('diagnosis.showResults', ['id' => $diagnosis->id]);
        // バリデーションやデータの整形を必要に応じて実施
    }
    
    public function showResults($id) {
        $diagnosis = Diagnosis::find($id);
        $tasks = $this->getRelevantTasks($diagnosis);

        return view('diagnosis.diagnosis_results', ['tasks' => $tasks]);
    }

    protected function getRelevantTasks($diagnosis)
    {
        // ここでタスクの取得ロジックを実装する
        // 例: $diagnosis->profile_info_id などの値を元に、task_conditionsテーブルと照合し、条件に合致するタスクを取得する

        // この部分は、具体的なロジックが完成するまで仮の値を返す
        return [];
    }
}
