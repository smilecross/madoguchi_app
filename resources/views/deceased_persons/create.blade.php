{{-- resources/views/deceased_persons/create.blade.php --}}
@extends('layouts.app_simple')

@section('content')
<div class="container flex justify-center h-screen items-center">
    <div class=" bg-white rounded-lg ">
    <h1 class="text-center font-semibold mt-4 mb-4">相続手続きページを作成する</h1>
    <form action="{{ route('deceased_persons.store') }}" method="post" class="w-full md:w-2/3 mx-auto">
        @csrf
        <p class="text-center">亡くなられた方のお名前</p>
        <div class="form-group mt-4 mb-4">
            <label for="firstname">姓</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>

        <div class="form-group mb-4">
            <label for="lastname">名</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>

        <div class="form-group mb-4">
            <label for="death_date">亡くなられた日</label>
            <input type="date" class="form-control" id="death_date" name="death_date" required>
        </div>
        <div class="flex justify-center mt-4">
            <button type="submit" class="mt-2.5 mb-4 text-center bg-amber-100 px-4 py-2 rounded">作成する</button>
        </div>
    </form>
    </div>
</div>
@endsection
