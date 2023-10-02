<x-app-layout>
<div class="container mt-16 mb-16 mx-auto w-2/3 bg-gray-100">
    <h2 class="mb-4 mt-6 text-xl font-semibold text-gray-900 dark:text-white text-center">手続き一覧（{{request()->route('location') }} ）</h2>
    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
    <form action="{{ route('manual-tasks.store') }}" method="POST" class="bg-white ">
        @csrf
        <div class="space-y-4 flex justify-center items-center min-h-screen">
        <table class="min-w-full divide-y divide-gray-200 space-y-4">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50"></th> <!-- チェックボックスのための列を追加 -->
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">手続きの種類</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">期限</th>
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
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="mt-4 text-center mx-auto bg-amber-100 rounded">保存する</button>
        
        </div>
    </form>
    </div>
    <div class="space-y-4 flex justify-center items-center min-h-screen">
        <a href="{{ route('dashboard') }}" class="mt-4  text-center mx-auto bg-amber-100 px-4 py-2 rounded">マイページに戻る</a>
    </div>

</div>
</x-app-layout>