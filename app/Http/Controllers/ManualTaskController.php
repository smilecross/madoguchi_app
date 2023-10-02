<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\ManualTask; 
use Illuminate\Http\Request;

class ManualTaskController extends Controller
{
    public function index()
    {
        $tasks = ManualTask::all(); // ManualTaskはマニュアル手続きを保存するためのモデル
        return view('manual-tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        // 選択された手続きのIDを取得
        $selectedTasks = $request->input('selected_tasks');

        foreach ($selectedTasks as $taskId) {
            // すでに保存されていないか確認
            $exists = ManualTask::where('task_id', $taskId)->exists();
            if (!$exists) {
                ManualTask::create(['task_id' => $taskId]);
            }
        }
        return redirect()->route('manual-tasks.index');
    }

    public function destroy($id)
    {
        $task = ManualTask::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect()->route('manual-tasks.index')->with('status', '手続きを削除しました。');
    }

    public function destroyAll()
    {
        Log::info('DestroyAll method called'); // メソッドが呼び出されたことをログに記録
        
        // 例：DBのtasksテーブルから全てのレコードを削除
        // ManualTask::truncate(); // このコードは、実際のテーブル名やモデル名に基づいて適切に変更してください。
        ManualTask::query()->delete();
        Log::info('Truncate method executed'); // Truncateが実行されたことをログに記録
        
        // 削除後、適切なページにリダイレクトする（ここでは例としてトップページにリダイレクトしています）
        return redirect()->route('dashboard')->with('success', '全てのタスクを削除しました。');
    }

}
