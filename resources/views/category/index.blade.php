@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

    <div class="container">
        @if(session('msg_success'))
            <div class="alert-success">
                {{ session('msg_success') }}
            </div>
        @endif

        <div class="contents"> <!-- float:left; -->
            <div class="issue-list">
                <h2 class="issue-list__title l-size">{{ '「'.$category->name.'」' }}のイシュー一覧</h2>
                <div class="cf">
                    <article>
                        <ul>
                            @if($posts->isNotEmpty())
                                @foreach ($posts as $post)
                                    <li class="issue-item">
                                        <dl>
                                            <dt class="iconBox">
                                                @if ($post->user->photo_id)
                                                    <img class="issue-item__icon" src="{{ url('/storage/profile_images/'. $post->user->photo['filename']) }}" alt="ユーザー画像">
                                                @else
                                                    <img class="issue-item__icon" src="{{ asset('img/no_image.png') }}" alt="ユーザー画像">
                                                @endif
                                            </dt>
                                            <dd class="infoBox">
                                                <h2 class="underline issue-item__title m-size">
                                                    <a href="{{ url('/post/'.$post->id ) }}">{{ str_limit($post->title, 70) }}</a>
                                                </h2>
                                                <span class="issue-item__subdescription">by {{ $post->user->name }}</span>
                                                <span class="issue-item__subdescription">{{ $post->user->division }}</span>
                                                <span class="issue-item__subdescription">{{ $post->created_at->format('Y.m.d(D) H:i') }}</span>
                                                <span class="issue-item__subdescription">{{ $post->category->name }}</span>
                                                <p class="issue-item__description s-size">{{ str_limit($post->description, 110) }}</p>
                                                <a class="s-size" href="{{ url('/post/'.$post->id ) }}">...続きを読む</a>
                                            </dd>
                                        </dl>
                                    </li>
                                @endforeach
                                {{ $posts->links() }}
                            @else
                                <p class="m-size">イシューはまだありません</p>
                            @endif
                        </ul>
                    </article>
                </div>
            </div>
        </div>

        @component('components.sidebar')
        @endcomponent

    </div>
@endsection