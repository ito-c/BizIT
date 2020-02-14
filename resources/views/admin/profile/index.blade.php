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

                <p>登録されているプロフィール</p>
                <img class="userInfo__icon" src="{{ $path }}" alt="ユーザー画像">
                
                <div class="userInfo__name">
                    {{ '名前：'. $auth->name }}
                </div>
                <div class="userInfo-group">
                    {{ $auth->division ? '所属：'. $auth->division : '所属：登録されていません' }}
                </div>
                <div class="userInfo-group">
                    {{ $auth->specialty ? '専門：'. $auth->specialty : '専門：登録されていません' }}
                </div>
                <div class="userInfo-group">
                    {{ $auth->hobby ? '趣味：'. $auth->hobby : '趣味：登録されていません' }}
                </div>
                <div class="userInfo-group">
                    {{ $auth->biography ? '自己紹介：'. $auth->biography : '自己紹介：登録されていません' }}
                </div>
                
                <a class="link" href="{{ url('/admin/profile/'.$auth->id.'/edit') }}">編集する</a>
                
            </div>
        </div>
    </div>
    
@endsection