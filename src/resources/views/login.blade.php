@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('auth')
    <!-- Registerボタン -->
    <form action="/register" method="get" class="auth-form">
        @csrf
        <button class="auth-form__button" type="submit">
            register
        </button>
    </form>
@endsection

@section('content')
<div class="login">
    <!-- セクションタイトル -->
    <h2 class="login__title">
        Login
    </h2>

    <form action="/login" method="post" class="form">
        @csrf
        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">メールアドレス
                </span>
            </div>
            <div class="form__group-content">
                <input type="email" class="form__input form__input--text" name="email" placeholder="例)test@example.com">
            </div>

            <div class="form__group-error">
                @error('email')
                    <p class="form__group-error--message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- パスワード -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">パスワード
                </span>
            </div>
            <div class="form__group-content">
                <input type="password" class="form__input form__input--text" name="password" placeholder="例)coachtech1106">
            </div>
            <div class="form__group-error">
                @error('password')
                    <p class="form__group-error--message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- ボタン -->
        <div class="form__button">
            <button class="form__button--submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection