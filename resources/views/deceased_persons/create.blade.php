{{-- resources/views/deceased_persons/create.blade.php --}}
@extends('layouts.app_simple')

@section('content')
<div class="container">
    <h1>相続手続き専用ページを作成する</h1>

    <form action="{{ route('deceased_persons.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="firstname">亡くなられた方の名前(名)</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>

        <div class="form-group">
            <label for="lastname">亡くなられた方の名前(性)</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>

        <div class="form-group">
            <label for="death_date">亡くなられた日</label>
            <input type="date" class="form-control" id="death_date" name="death_date" required>
        </div>

        <button type="submit" class="btn btn-primary">作成する</button>
    </form>
</div>
@endsection
