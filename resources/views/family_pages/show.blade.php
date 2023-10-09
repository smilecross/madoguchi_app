{{-- resources/views/family_pages/show.blade.php --}}
@extends('layouts.app_simple')

@section('content')
<x-slot name="header">
         <p></p>
         <p></p>
    </x-slot>
    <br>
    <div class="mx-auto max-w-screen-xl px-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-center font-bold mt-4 mb-4">ファミリーページ</h1>
            <p class="text-center mb-2">お名前: {{ $familyPage->deceasedPerson->firstname }} {{ $familyPage->deceasedPerson->lastname }} 様</p> 
            <p class="text-center mb-4">命日: {{ optional($familyPage->deceasedPerson)->death_date ?: '未設定' }}</p> 
        </div>
    
    {{-- ここからボタン --}}
    <div class="mt-8 px-8">
        <div class="grid grid-cols-1 max-w-7xl mx-auto sm:px-6 md:grid-cols-3 gap-6 lg:gap-8">
            <div  class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
            <div class="h-16 w-16 bg-amber-100  flex items-center justify-center rounded-full"> 
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
                <a href="{{ route('invite') }}" class="btn btn-primary mt-6 text-xl font-semibold text-gray-900 dark:text-white ">相続人を招待する</a>
                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                相続人の方を招待します。分担して相続手続きを進めていきます。 
                </p>
            </div>
        </div>            

        <div href="" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div>
                <div class="h-16 w-16 bg-amber-100 flex items-center justify-center rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
                <a href="{{ route('family_pages.diagnoses.start') }}" class="btn btn-primary mt-6 text-xl font-semibold text-gray-900 dark:text-white ">必要な手続きを調べる</a>
                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                必要な手続きを調べるところから始めましょう。家族構成や職業などによって必要な手続きが異なります。
                </p>
            </div>
        </div>

        <div href="" class="scale-100 p-6 bg-amber-100 dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div>
                <div class="h-16 w-16 bg-white flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    </div>
                    <a href="{{ route('family_pages.chat.index', ['family_page_id' => $familyPage->id]) }}" class="btn btn-primary mt-6 text-xl font-semibold text-gray-900 dark:text-white ">相続手続きToDoリスト</a>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    相続に関するセンシティブなコミュニケーションはこちらのチャットをご利用ください。
                </p>
            </div>
        </div>

        <div href="" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <div class="h-16 w-16 bg-amber-100 flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <a href="{{ route('family_pages.chat.index', ['family_page_id' => $familyPage->id]) }}" class="btn btn-primary mt-6 text-xl font-semibold text-gray-900 dark:text-white ">チャット</a>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    相続に関するセンシティブなコミュニケーションはこちらのチャットをご利用ください。
                    </p>
                </div>
        </div>
</div>
{{-- 他の情報や機能が追加される場合はこちらにコードを追記 --}}
    <div class="flex justify-center">
        <a href="{{ route('dashboard') }}" class="block mt-4 mb-4 text-center bg-amber-100 px-4 py-2 rounded">マイページに戻る</a>
    </div>
@endsection
