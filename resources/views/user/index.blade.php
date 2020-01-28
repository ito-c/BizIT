@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="isolation cf">
            <div class="userInfo">
                @if ($user->is_photo())
                    <img class="userInfo__icon" src="{{ url('/storage/profile_images/'. $user->photo['filename']) }}" alt="ユーザー画像">
                @else
                    <img class="userInfo__icon" src="{{ asset('img/no_image.png') }}" alt="ユーザー画像">
                @endif
                
                <div class="userInfo__name">
                    {{ $user->name }}
                </div>
                <div class="userInfo-group">
                    {{ $user->division ? '所属：'. $user->division : '' }}
                </div>
                <div class="userInfo-group">
                    {{ $user->specialty ? '専門：'. $user->specialty : '' }}
                </div>
                <div class="userInfo-group">
                    {{ $user->hobby ? '趣味：'. $user->hobby : '' }}
                </div>
                <div class="userInfo-group">
                    {{ $user->biography ? '自己紹介：'. $user->biography : '' }}
                </div>
            </div><!-- userInfo -->

            <div class="issue-area cf">
                <h2 class="issue-list__title l-size">投稿イシュー一覧</h2>
                <article>
                    <ul>
                        @if($posts->isNotEmpty())
                            @foreach ($posts as $post)
                                <li class="issue-item">
                                    <dl>
                                        <dt>
                                            <h2 class="m-size">
                                                <a class="underline" href="{{ route('post', ['id' => $post->id]) }}">{{ str_limit($post->title, 70) }}</a>
                                            </h2>
                                        </dt>
                                        <dd>
                                            <span class="issue-item__subdescription">{{ $post->created_at->format('Y.m.d(D) H:i') }}</span>
                                            <span class="issue-item__subdescription">by {{ $post->user->name }}</span>
                                            <span class="issue-item__subdescription">{{ $post->category->name }}</span>
                                            <p class="issue-item__description">
                                                {{ str_limit($post->description, 100) }}<br>
                                            </p>
                                        </dd>
                                    </dl>
                                </li>
                            @endforeach
                            {{ $posts->links() }}
                        @else
                            <p>投稿したイシューはありません</p>
                        @endif
                    </ul>
                </article>
            </div><!-- issue-area -->
        </div><!-- isolation cf -->
    </div><!-- container -->

@endsection