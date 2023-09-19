{{-- resources/views/procedure_pages/create.blade.php --}}
@extends('layouts.app_simple')

@section('content')
<div class="container">
    <h1>手続きページを作成する</h1>

    
    <form action="{{ route('procedure_pages.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="inheritor_name">亡くなられた方の名前</label>
            <input type="text" class="form-control" id="inheritor_name" name="inheritor_name" required>
        </div>

        <div class="form-group">
            <label for="deceased_date">亡くなられた日</label>
            <input type="date" class="form-control" id="deceased_date" name="deceased_date" required>
        </div>

        <button type="submit" class="btn btn-primary">作成</button>
    </form>
</div>
@endsection
