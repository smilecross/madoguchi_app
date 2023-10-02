@extends('layouts.app_simple')

@section('content')
    <div class="container mt-16 mb-4 mx-auto w-2/3"> <!-- w-2/3とmx-autoを追加して中央に配置 -->
        <h2 class="mb-4 mt-6 text-xl font-semibold text-gray-900 dark:text-white text-center">マニュアル手続きリスト</h2>
        
        <!-- テーブルに変更 -->
        <table class="min-w-full divide-y divide-gray-200 mb-4">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">手続きの種類</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">期限</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">削除</th> <!-- 削除ボタンのための列 -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($tasks as $task)
                    <tr>
                        <td class="px-6 py-4">{{ $task->taskDetails->task_name }}</td>
                        <td class="px-6 py-4">{{ $task->taskDetails->deadline_days }} 日</td>
                        <td class="px-6 py-4">
                            <!-- 削除ボタンとその機能を組み込むためのフォーム -->
                            <form action="{{ route('manual-tasks.destroy', $task->id) }}" method="POST" style="display:inline" onsubmit="return confirm('本当に削除しますか？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="space-y-4 flex justify-center items-center min-h-screen">
            <a href="{{ route('dashboard') }}" class="mt-4  text-center mx-auto bg-amber-100 px-4 py-2 rounded">マイページに戻る</a>
        </div>
        <!-- 全て削除するボタンを設置 -->
        {{-- <form action="{{ route('manual-tasks.destroyAll') }}" method="POST" onsubmit="return confirm('本当に全て削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">全て削除する</button>
        </form> --}}

    </div>
@endsection

