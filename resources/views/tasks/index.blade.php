<x-app-layout>
<div class="container mt-4 bg-gray-100">
    <h2 class="mb-4">手続き一覧（{{request()->route('location') }}）</h2>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
    <form action="{{ route('manual-tasks.store') }}" method="POST" class="bg-white space-y-4 flex justify-center items-center min-h-screen">
        @csrf
        
        <table class="min-w-full divide-y divide-gray-200 space-y-4 flex justify-center items-center min-h-screen">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50"></th> <!-- チェックボックスのための列を追加 -->
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">手続きの種類</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">期限</th>
                    {{-- <th class="px-6 py-3 bg-gray-50">操作</th> --}}
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
</div>
</x-app-layout>