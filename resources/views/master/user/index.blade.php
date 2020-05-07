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

                @if (!$users->isEmpty())
                    <p>全ユーザー一覧</p>
                    <table class="contents__table">
                        <thead>
                            <tr>
                                <th>登録日</th>
                                <th>名前</th>
                                <th>所属</th>
                                <th>アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->created_at->format('Y.m.d(D) H:i') }}
                                    </td>
                                    <td>
                                        <a class="link" href="{{ route('user', ['id' => $user->id]) }}" target="_blank">{{ $user->name }}</a>
                                    </td>
                                    <td>
                                        {{ $user->division }}
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('master_user.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="link m-size" type="submit">削除する</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                @else
                    <p>ユーザーはいません</p>
                @endif
            </div>
        </div>
    </div>
    
@endsection