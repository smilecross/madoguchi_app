{{-- resources/views/procedure_pages/index.blade.php --}}
@extends('layouts.app_simple')

@section('content')
<div class="container">
    <h1>手続きページ一覧</h1>

    <a href="{{ route('procedure_pages.create') }}" class="btn btn-primary mb-3">新規作成</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>相続人の名前</th>
                <th>作成日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($procedure_pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->inheritor_name }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>
                        // ここに詳細や編集リンクなどを配置
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
