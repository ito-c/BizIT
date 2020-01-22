@extends('layouts.common')

@section('pageCss')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <div class="container s-size">
        <div class="box">
            <div class="card">
                <div class="card-header">パスワードリセット</div>

                <div class="card-body">
                    <p class="card-description">新しいパスワードを設定します。</p>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label class="form-label" for="email">メールアドレス</label>
                            <input class="form-input" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">パスワード</label>
                            <input class="form-input" type="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password-confirm">パスワード確認</label>
                            <input class="form-input" type="password" name="password_confirmation" required>
                        </div>

                        @component('components.formErrors')
                        @endcomponent

                        <button class="btn-flat-border" type="submit">リセット</button>

                    </form>
                </div>{{-- card-body --}}
            </div>{{-- card --}}
        </div>{{-- box --}}
    </div>{{-- container --}}
@endsection
