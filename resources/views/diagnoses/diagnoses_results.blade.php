@extends('layouts.app_simple')

@section('content')
<h1>診断結果に基づくタスク</h1>

<ul>
    @foreach($tasks as $task)
        <li>{{ $task->task_name }}</li>
    @endforeach
</ul>
@endsection

