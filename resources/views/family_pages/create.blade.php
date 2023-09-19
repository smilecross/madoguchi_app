@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('family_pages.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="inheritor_name">Inheritor Name</label>
                <input type="text" name="inheritor_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="deceased_date">Deceased Date</label>
                <input type="date" name="deceased_date" class="form-control" required>
            </div>
            <!-- 他のフォーム要素を追加 -->

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
