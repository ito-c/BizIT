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

                <p>カテゴリー申請フォーム</p>
                <form method="POST" action="{{ route('category_request.store')}}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="name">カテゴリー名</label>
                        <p class="label-description s-size">新たに使用したいカテゴリーがある場合、こちらのフォームより管理者へ申請ください。管理者が内容確認のうえ、承認もしくは否認します。</p>
                        <input class="form-input" type="text" name="name" placeholder="申請するカテゴリー名を入力してください" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="description">申請の詳細・理由等</label>
                        <textarea class="form-input" type="text" name="description" cols="45" rows="3" maxlength="1000" placeholder="申請の詳細や理由を入力してください">{{ old('description') }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <button class="submit" type="submit">申請する</button>
                    </div>
                </form>

                @component('components.formErrors')
                @endcomponent
                
            </div>
        </div>
    </div>
    
@endsection