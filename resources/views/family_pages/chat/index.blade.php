@extends('layouts.app_simple')

@section('content')

<style>
    .other::before {
        content: "";
        position: absolute;
        top: 90%;
        left: -15px;
        margin-top: -30px;
        border: 5px solid transparent;
        border-right: 15px solid #c7deff;
    }
    .self::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 100%;
        margin-top: -15px;
        border: 3px solid transparent;
        border-left: 9px solid #c7deff;
    }
 /* 他者からのメッセージ */
    .other {
        background-color: #c7deff;
        border-radius: 10px 10px 10px 0;
        position: relative;
        margin: 10px 0;
        padding: 10px;
        max-width: 80%;
    }

    .other::before {
        content: "";
        position: absolute;
        top: 10px;
        left: -10px;
        width: 0;
        height: 0;
        border: 8px solid transparent;
        border-right: 10px solid #c7deff;
    }

    /* 自分からのメッセージ */
    .self {
        background-color: #d1ffc7;
        border-radius: 10px 10px 0 10px;
        position: relative;
        margin: 10px 0;
        padding: 10px;
        max-width: 80%;
        margin-left: auto;
    }

    .self::after {
        content: "";
        position: absolute;
        top: 10px;
        right: -10px;
        width: 0;
        height: 0;
        border: 8px solid transparent;
        border-left: 10px solid #d1ffc7;
    }

    /* 以下のスタイルを追加 */
    .chat-container {
        background-color: #ffffff;
        width: 66.66%; /* 画面の2/3 */
        margin: 0 auto;
    }

    .message-input {
        width: 50%; /* 画面の1/2 */
        border-radius: 15px; /* コーナーを丸くする */
    }
</style>

<div class="chat-container mt-8 h-screen rounded">
    <br>
    <div class="text-center mx-auto my-4">
        <h2 class="mt-4 text-xl font-bold"> 相続手続き専用トークルーム</h2>
    </div>
    <div class="mt-4">
    <form action="{{ route('family_pages.chat.store', $family_page_id) }}" method="post" class="flex justify-end">
        @csrf
        <textarea class="message-input" name="message"></textarea>
        <button type="submit">送信</button>
    </form>

    @foreach($chats as $chat)
    <div class="{{ Auth::user()->id == $chat->user_id ? 'self' : 'other' }}">
        <strong>{{ $chat->user->name }}</strong>: {{ $chat->message }}

        @if(Auth::user()->id == $chat->user_id)
            <a href="{{ route('family_pages.chat.destroy', [$family_page_id, $chat->id]) }}" onclick="event.preventDefault();document.getElementById('delete-form-{{ $chat->id }}').submit();">削除</a>
            <form id="delete-form-{{ $chat->id }}" action="{{ route('family_pages.chat.destroy', [$family_page_id, $chat->id]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @endif
    </div>
    @endforeach
    </div>
    
</div>
<div class="w-full md:w-1/4 mx-auto text-center">
        @if(session('family_page_id'))
            <a href="{{ route('family_pages.show', session('family_page_id')) }}" class="block mt-4 mb-4 text-center bg-amber-100 px-4 py-2 w-full md:w-2/3 mx-auto rounded">ファミリーページに戻る</a>
        @endif
    </div>
@endsection
