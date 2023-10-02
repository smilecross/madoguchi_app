@extends('layouts.app')

@section('content')
<div class="container">
    <h2>他の相続人を招待</h2>
    <form action="{{ route('send.invite') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">招待したい方のメールアドレス</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">招待を送る</button>
    </form>
</div>
@endsection
