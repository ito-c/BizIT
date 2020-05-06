@extends('layouts.adminCommon')

@section('content')
    <div class="container">
        <div class="contents">
            <div class="isolation m-size">
                <p>カテゴリー申請の詳細</p>
                <div class="form-group underline">
                    申請時間：{{ $categoryRequest->created_at->format('Y.m.d(D) H:i') }}
                </div>
                <div class="form-group underline">
                    カテゴリー名：{{ $categoryRequest->name }}
                </div>
                <div class="form-group underline">
                    詳細・申請理由：{{ $categoryRequest->description }}
                </div>

                <form method="POST" action="{{ route('master_category_request.store') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $categoryRequest->id }}">
                    <div class="form-group">
                        <button class="submit" type="submit">承認する</button>
                    </div>
                </form>

                <form method="POST" action="{{ route('master_category_request.destroy', $categoryRequest->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <button class="submit" type="submit">否認する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection