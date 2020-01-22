@extends('layouts.adminCommon')

@section('content')
    <div class="container">
        <div class="contents">
            <div class="isolation m-size">
                
                @if(session('msg_success'))
                    <div class="alert-success">
                        {{ session('msg_success') }}
                    </div>
                @endif

                @if (!$posts->isEmpty())
                    <p class="contents-title">投稿一覧</p>
                    <table class="contents__table">
                        <thead>
                            <tr>
                                <th>投稿時間</th>
                                <th>タイトル</th>
                                <th>カテゴリー</th>
                                <th>アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->created_at->format('Y.m.d(D) H:i') }}
                                    </td>
                                    <td>
                                        <a class="link" href="{{ route('post', ['id' => $post->id]) }}" target="_blank">{{ str_limit($post->title, 70) }}</a>
                                    </td>
                                    <td>
                                        {{ $post->category->name }}
                                    </td>
                                    <td>
                                        <a class="link m-size" href="{{ route('post.edit', ['id' => $post->id]) }}">編集画面へ</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                @else
                    <p>投稿はありません</p>
                @endif
            </div>
        </div>
    </div>
    
@endsection