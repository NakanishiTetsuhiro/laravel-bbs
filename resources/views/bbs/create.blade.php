@extends('layouts.default')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">

        <h1>投稿ページ</h1>

        {{-- 投稿完了時にフラッシュメッセージを表示 --}}
        @if(Session::has('message'))
            <div class="bg-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

        {{-- エラーメッセージの表示 --}}
        @foreach($errors->all() as $message)
            <p class="bg-danger">{{ $message }}</p>
        @endforeach

        <form action="{{ url("bbs/") }}" method="post" class="form">
            @csrf
            <div class="form-group">
                <label for="title" class="">タイトル</label>
                <div class="">
                    <input id="title" type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="cat_id" class="">カテゴリー</label>
                <div class="">
                    <select name="cat_id" type="text" class="form-control">
                        <option></option>
                        <option value="1" name="1">電化製品</option>
                        <option value="2" name="2">食品</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="content" class="">本文</label>
                <div class="">
                    <input type="textarea" name="content" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">投稿する</button>
            </div>
        </form>
    </div>
@stop