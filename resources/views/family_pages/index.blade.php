{{-- resources/views/family_pages/index.blade.php --}}
@extends('layouts.app_simple')

  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex">

        <!-- Navigation Links -->
        
        <!-- 🔽 一覧ページへのリンクを追加 -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('family_pages.chat.index')" :active="request()->routeIs('family_pages.chat.index')">
            {{ __('Index') }}
          </x-nav-link>
        </div>
        <!-- 🔽 作成ページへのリンクを追加 -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
          <x-nav-link :href="route('family_pages.chat.create')" :active="request()->routeIs('family_pages.chat.create')">
            {{ __('Create') }}
          </x-nav-link>
        </div>

      </div>

@section('content')
<div class="container">
    <h1>手続き</h1>
    <br>
    <a href="{{ route('family_pages.diagnosis.start') }}" class="btn btn-primary mb-3">必要な手続きを調べる</a>
    <br>
    <a href="{{ route('invite') }}">招待する</a>
    @include('emails.invite_mail')
    {{-- <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>亡くなられた方のお名前</th>
                <th>亡くなられた日</th>
                <th>作成日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($family_pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->inheritor_name }}</td>
                    <td>{{ $page->deceased_date->format('Y-m-d') }}</td>
                    <td>{{ $page->deceased_date ? $page->deceased_date->format('Y-m-d') : 'N/A' }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>
                        // ここに詳細や編集リンクなどを配置
                    </td>
                </tr>
            @endforeach
           {{-- {{ dd($family_pages) }}  --}}
        {{-- </tbody> --}}
    {{-- </table>  --}}
</div>
@endsection

<!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    
    <!-- 🔽 一覧ページへのリンクを追加 -->
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('family_pages.chat.index')" :active="request()->routeIs('chat.index')">
        {{ __('Index') }}
      </x-responsive-nav-link>
    </div>
    <!-- 🔽 作成ページへのリンクを追加 -->
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link :href="route('family_pages.chat.create')" :active="request()->routeIs('chat.create')">
        {{ __('Create') }}
      </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
      <div class="px-4">
        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
      </div>
    </div>

  </div>
