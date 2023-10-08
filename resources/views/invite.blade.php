@extends('layouts.app_simple')

@section('content')
<div class="container">
    <h2>他の相続人を招待</h2>
    <form action="{{ route('send.invite') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">招待したい方のメールアドレス</label>
            <input type="email" name="email" id='email' class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">招待を送る</button>
    </form>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if(session('family_page_id'))
        <br>
        <a href="{{ route('family_pages.show', session('family_page_id')) }}" class="btn btn-secondary">FamilyPageに戻る</a>
    @endif
</div>
@endsection
