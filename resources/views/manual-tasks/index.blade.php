@extends('layouts.app_simple')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">マニュアル手続きリスト</h2>
        
        <ul>
            @foreach($tasks as $task)
                <li>
                    {{-- {{ dd($task) }} --}}
                    {{-- {{ $task->task_name }} (期限: {{ $task->deadline_days }}) --}}
                    {{ $task->taskDetails->task_name }} (期限: {{ $task->taskDetails->deadline_days }})
 
                    <!-- 削除ボタンとその機能を組み込むためのフォーム -->
                    <form action="{{ route('manual-tasks.destroy', $task->id) }}" method="POST" style="display:inline" onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
