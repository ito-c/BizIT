@extends('layouts.adminCommon')

@section('content')
    <div class="container">
        <div class="contents">
            <div class="isolation m-size">
                <p>プロフィール編集</p>
                <form method="POST" action="{{ url('admin/profile/'.$auth->id )}}" enctype="multipart/form-data">
                    
                    @csrf
                    @method('PATCH')

                    <div id="file-preview">
                        <div class="form-group">
                            <label class="form-label" for="photo_id">プロフィール画像</label>
                            <input class="form-input" type="file" name="photo_id" accept="image/*" v-on:change="onFileChange">
                        </div>
                        <img class="userInfo__icon" v-bind:src="imageData" v-if="imageData">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="division">所属</label>
                        <input class="form-input" type="text" name="division" placeholder="所属を入力してください" value="{{ $auth->division }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="specialty">専門</label>
                        <input class="form-input" type="text" name="specialty" placeholder="専門分野を入力してください" value="{{ $auth->specialty }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="hobby">趣味</label>
                        <input class="form-input" type="text" name="hobby" placeholder="趣味を入力してください" value="{{ $auth->hobby }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="biography">自己紹介</label>
                        <textarea class="form-input" type="text" name="biography" cols="45" rows="3" placeholder="自己紹介を入力してください">{{ $auth->biography }}</textarea>
                    </div>

                    <div class="form-group brank">
                        <button class="submit" type="submit">完了する</button>

                        @component('components.formErrors')
                        @endcomponent
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
@endsection