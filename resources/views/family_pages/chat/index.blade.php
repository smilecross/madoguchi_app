<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- (中略) -->

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
        </style>
    </head>
    <body class="w-4/5 md:w-3/5 lg:w-2/5 m-auto">
        <h1 class="my-4 text-3xl font-bold">{{env('APP_NAME')}}</h1>
       

        <form action="{{ route('family_pages.chat.store', $family_page_id) }}" method="post">
            @csrf
            <textarea name="message"></textarea>
            <button type="submit">送信</button>
        </form>

       

       @foreach($chats as $chat)
        <div>
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

        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">マイページに戻る</a>
        </div>
    </body>
</html>
