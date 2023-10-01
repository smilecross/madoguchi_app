<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard^^') }}
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ route('tasks.filter', '市区町村役場など') }}" class="btn btn-primary">市町村役場</a>
        <a href="{{ route('tasks.filter', '勤務先') }}" class="btn btn-primary">勤務先</a>
        <a href="{{ route('tasks.filter', 'オンライン') }}" class="btn btn-primary">オンライン</a>
        <a href="{{ route('tasks.filter', 'その他') }}" class="btn btn-primary">その他</a>
        <a href="{{ route('manual-tasks.index') }}" class="btn btn-primary">手続き一覧</a>
    </div>
    <div class="flex justify-center">
        <a href="{{ route('procedure_pages.index') }}">手続きページ一覧</a>
        <a href="{{ route('procedure_pages.create') }}">手続きページを作成</a>
    </div>
</x-app-layout>

    
