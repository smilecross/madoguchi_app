{{-- resources/views/family_pages/show.blade.php --}}
@extends('layouts.app_simple')

@section('content')
<div class="container">
    <h1>手続き詳細ページ</h1>
    
    <p>亡くなられた方の名前: {{ $familyPage->deceasedPerson->firstname }} {{ $familyPage->deceasedPerson->lastname }}</p>
    <p>亡くなられた日: {{ optional($familyPage->deceasedPerson)->death_date ?: '未設定' }}</p>

    <br>
    
    <h2>操作メニュー</h2>
    <a href="{{ route('invite') }}">相続人を招待する</a>
    <br>
    <a href="{{ route('family_pages.diagnosis.start') }}" class="btn btn-primary mb-3">必要な手続きを調べる</a>
    <br>
    
    <a href="{{ route('family_pages.chat.index', ['family_page_id' => $familyPage->id]) }}">チャット</a>

    
    {{-- 他の情報や機能が追加される場合はこちらにコードを追記 --}}
    <br>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">マイページに戻る</a>
</div>
@endsection
