@extends('layouts.adminCommon')

@section('content')
    <div class="container">
        <div class="contents">
            <div class="isolation m-size">
                <p>イシュー編集</p>
                    <form method="POST" action="{{ url('admin/post/'.$post->id )}}">
                        
                        @csrf
                        @method('PATCH')
        
                        <div class="form-group">
                            <label class="form-label" for="title">タイトル</label>
                            <input class="form-input" type="text" name="title" placeholder="イシューのタイトルを入力してください" value="{{ old('title', isset($post->title) ? $post->title : '') }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">詳細</label>
                            <textarea class="form-input" type="text" name="description" cols="45" rows="10" maxlength="1000" placeholder="イシューの詳細を入力してください">{{ old('description', isset($post->description) ? $post->description : '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="category_id">カテゴリー</label>
                            <select class="form-select" name="category_id">
                                <option disabled selected>選択してください</option>
                                @if(old('category_id'))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                @else
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $post->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="submit" type="submit">完了する</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ url('admin/post/'. $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <button class="submit" type="submit">ごみ箱へ</button>
                        </div>
                    </form>

                @component('components.formErrors')
                @endcomponent
                
            </div>
        </div>
    </div>
    
@endsection