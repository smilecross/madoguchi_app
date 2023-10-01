<div class="container mt-4">
    <h2 class="mb-4">タスク一覧（{{ request()->route('location') }}）</h2>
    
    <form action="{{ route('manual-tasks.store') }}" method="POST">
        @csrf
        
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50"></th> <!-- チェックボックスのための列を追加 -->
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">タスク名</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">締切日</th>
                    <th class="px-6 py-3 bg-gray-50">操作</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($tasks as $task)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- チェックボックスをここに配置 -->
                            <input type="checkbox" name="selected_tasks[]" value="{{ $task->id }}">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->task_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $task->deadline_days }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- ここに追加や削除のアクションボタンを配置 -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <button type="submit" class="mt-4">保存する</button>
    </form>
</div>
