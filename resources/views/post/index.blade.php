@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="post">
            <div class="wrap">
                
                <div class="userInfo">
                    <a href="{{ route('user', ['id' => $post->user->id]) }}">
                        <span class="userIcon">
                            <img class="userInfo__miniIcon" src="{{ $path }}" alt="ユーザー画像"> 
                        </span>
                        <span class="userName">{{ $post->user->name }}</span>
                    </a>
                    <span class="userName">{{ $post->user->division }}</span>
                    <span class="date">| {{ $post->created_at->format('Y.m.d(D) H:i') }}</span>
                </div>

                <div class="post__likeCounter">
                    <div class="counts">
                        <i class="far fa-thumbs-up"></i> {{ $count_like_users }} Like!</div>
                        <div class="btn">
                        {{-- postの投稿者が自分でない場合に下へ --}}
                        @if (Auth::id() != $post->user->id)
                            {{-- 自分がpostにlikeをつけている（true）場合は下へ --}}
                            @if (Auth::user()->is_like($post->id)) 
                                {{-- likeを外す --}}
                                <form method="POST" action="{{ route('likes.unlike', ['id' => $post->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                        <button class="submit" type="submit">likeを外す</button>
                                </form>
                            @else
                                {{-- likeをつける --}}
                                <form method="POST" action="{{ route('likes.like', ['id' => $post->id]) }}">
                                    @csrf
                                    <button class="submit" type="submit">like!</button>
                                </form>
                            @endif
                        @endif
                    </div>{{-- counts --}}
                </div>{{-- post__likeCounter --}}

            </div>{{-- wrap --}}

            <div class="post__postTitle">
                <span>{{ $post->title }}</span>
            </div>
        </div>{{-- post --}}

        <div class="contents"> <!-- float:left; -->
            <div class="postInfo__title l-size">詳細</div>
            <div class="postInfo__content m-size">
                {{ $post->description }}
            </div>

            <div class="postInfo__title l-size">カテゴリー</div>
            <div class="postInfo__category  m-size">
                <a class="btn-category" href="{{ route('category', ['id' => $post->category->id]) }}">{{ $post->category->name }}</a>
            </div>
            
            <div class="postInfo__title l-size">コメント</div>
            @foreach ($comments as $comment)
                <div class="postInfo__commentArea">
                    <div class="postInfo__comment">
                        {{ $comment->detail }}
                    </div>

                    <div class="userInfo__comment cf">
                        <div class="box1">
                            <a href="{{ route('user', ['id' => $comment->user->id]) }}">
                                @if ($comment->user->is_photo())
                                    <img class="userInfo__commentIcon" src="{{ Storage::disk('s3')->url('profile/'. $comment->user->photo->filename) }}" alt="ユーザー画像">
                                @else
                                    <img class="userInfo__commentIcon" src="{{ asset('img/no_image.png') }}" alt="ユーザー画像">
                                @endif
                                    <span class="userName">{{ $comment->user->name }}</span>
                            </a>
                            <span>{{ '　'.$comment->user->division }}</span>
                            <span>| {{ $comment->created_at->format('Y.m.d(D) H:i') }}</span>
                        </div>
                                            
                        {{-- コメントの投稿者が自分の場合に削除ボタン表示 --}}
                        @if ($comment->user->id == Auth::id())
                            <div class="box2">
                                <form method="POST" action="{{ route('comment.destroy', ['id' => $comment->id]) }}">
                                    @csrf
                                    @method('DELETE') 
                                    <button type="submit">削除</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            <form class="postInfo__commentForm" method="post" action="{{ route('comment.store') }}">
                @csrf

                <div class="form-group">
                    <label class="s-size" for="detail">コメントする</label>
                    <textarea class="postInfo__commentForm--textarea" name="detail" cols="45" rows="5" maxlength="1000"></textarea>
                </div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input class="postInfo__commentForm--button" type="submit" value="送信">
            </form>

            @component('components.formErrors')
            @endcomponent

        </div>

        @component('components.sidebar')
        @endcomponent

    </div>

@endsection