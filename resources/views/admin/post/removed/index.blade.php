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

                @if (!$deletedPosts->isEmpty())
                    <p>ごみ箱</p>
                    <table class="contents__table">
                        <thead>
                            <tr>
                                <th>削除時間</th>
                                <th>タイトル</th>
                                <th>カテゴリー</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deletedPosts as $deletedPost)
                                <tr>
                                    <td>{{ $deletedPost->deleted_at->format('Y.m.d(D) H:i') }}</td>
                                    <td><a class="link" href="{{ url('/admin/post/removed/'.$deletedPost->id.'/edit') }}">{{ str_limit($deletedPost->title, 70) }}</a></td>
                                    <td>{{ $deletedPost->category->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $deletedPosts->links() }}
                @else
                    <p>ごみ箱は空です</p>
                @endif
            </div>
        </div>
    </div>
    
@endsection