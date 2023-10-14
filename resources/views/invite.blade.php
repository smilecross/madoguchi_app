@extends('layouts.app_simple')

@section('content')
<div class="flex justify-center items-center m-10 p-10">
    <div class="container mx-auto  flex flex-col justify-center items-center bg-white rounded-lg ">
    <h1 class="text-center font-semibold mt-4 mb-4">他の相続人を招待</h1>
    <form action="{{ route('send.invite') }}" method="post" class="w-full md:w-1/2 mx-auto text-center">
        @csrf
        <div class="form-group w-full mb-4">
            <label for="email" class="block mb-2">招待したい方のメールアドレス</label>
            <input type="email" name="email" id='email' class="form-control w-full px-2 py-2 border rounded" required>
        </div>
        <div class="mt-4 mb-4">
            <button type="submit" class="btn btn-primary text-center">招待を送る</button>
        </div>
    </form>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    </div>
    
</div>
    <div class="w-full md:w-1/4 mx-auto text-center">
        @if(session('family_page_id'))
            <a href="{{ route('family_pages.show', session('family_page_id')) }}" class="block mt-4 mb-4 mx-auto text-center bg-amber-100 px-4 py-2 rounded">ファミリーページに戻る</a>
        @endif
    </div>
@endsection
