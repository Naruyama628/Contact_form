@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('auth')
    <!-- Loginボタン -->
    <form action="/login" method="get" class="auth-form">
        <button class="auth-form__button" type="submit">
            Login
        </button>
    </form>
@endsection

@section('content')
<div class="register">
    <!-- セクションタイトル -->
    <h2 class="register__title">
        Register
    </h2>

    <form action="" class="form">
        @csrf
        <!-- お名前 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">お名前
                </span>
            </div>
            <div class="form__group-content">
                <input type="text" class="form__input" name="name" placeholder="例)山田　太郎">
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">メールアドレス
                </span>
            </div>
            <div class="form__group-content">
                <input type="email" class="form__input" name="email" placeholder="例)test@example.com">
            </div>
        </div>

        <!-- パスワード -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">パスワード
                </span>
            </div>
            <div class="form__group-content">
                <input type="password" class="form__input" name="password" placeholder="例)coachtech1106">
            </div>
        </div>

        <!-- ボタン -->
        <div class="form__button">
            <button class="form__button--submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection