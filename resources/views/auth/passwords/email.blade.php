@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <div class="container s-size">
        <div class="box">
            <div class="card">
                <div class="card-header">パスワードリセット</div>

                <div class="card-body m-size">
                    @if (session('status'))
                        <div class="card-status" role="alert">{{ session('status') }}</div>
                    @endif

                    <p class="card-description s-size">パスワードを再設定します。BizITに登録したメールアドレスを入力してください。</p>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label class="form-label" for="email">メールアドレス</label>
                            <input class="form-input" type="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        @component('components.formErrors')
                        @endcomponent

                        <button class="btn-flat-border" type="submit">送信する</button>

                    </form>
                </div>{{-- card-body --}}
            </div>{{-- card --}}
        </div>{{-- box --}}
    </div>{{-- container --}}
@endsection
