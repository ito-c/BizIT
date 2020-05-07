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

                @if (!$categoryRequests->isEmpty())
                    <p>カテゴリー申請一覧</p>
                    <table class="contents__table">
                        <thead>
                            <tr>
                                <th>申請時間</th>
                                <th>カテゴリー名</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryRequests as $categoryRequest)
                                <tr>
                                    <td>
                                        {{ $categoryRequest->created_at->format('Y.m.d(D) H:i') }}
                                    </td>
                                    <td>
                                        <a class="link" href="{{ route('master_category_request.show', $categoryRequest->id) }}">{{ $categoryRequest->name }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>申請はありません</p>
                @endif
                
            </div>
        </div>
    </div>
    
@endsection