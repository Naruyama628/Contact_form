@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <!-- セクションタイトル -->
    <h2 class="section-title">
        Contact
    </h2>

    <form action="/confirm" method="post" class="form">
        @csrf
        <!-- お名前 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input type="text" class="form__input form__input--text" name="last_name" placeholder="例)山田">
                <input type="text" class="form__input form__input--text" name="first_name" placeholder="例)太郎">
            </div>
        </div>

        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <label class="radio-button">
                    <input type="radio" class="form__input form__input--radio" name="gender" value="1">
                    <span class="radio-button__circle"></span>
                    <span class="radio-button__text">男性</span>
                </label>
                <label class="radio-button">
                    <input type="radio" class="form__input form__input--radio" name="gender" value="2">
                    <span class="radio-button__circle"></span>
                    <span class="radio-button__text">女性</span>
                </label>
                <label class="radio-button">
                    <input type="radio" class="form__input form__input--radio" name="gender" value="3">
                    <span class="radio-button__circle"></span>
                    <span class="radio-button__text">その他</span>
                </label>
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input type="email" class="form__input form__input--text" name="email" placeholder="例)test@example.com">
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content form__group-content--tel">
                <input type="tel" class="form__input form__input--tel" name="tel_1" placeholder="080">
                <span class="form__sep">-</span>
                <input type="tel" class="form__input form__input--tel" name="tel_2" placeholder="1234">
                <span class="form__sep">-</span>
                <input type="tel" class="form__input form__input--tel" name="tel_3" placeholder="5678">
            </div>
        </div>

        <!-- 住所 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input type="text" class="form__input form__input--text" name="address" placeholder="例)東京都渋谷区千駄ヶ谷1-2-3">
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">建物名</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input type="text" class="form__input form__input--text" name="building" placeholder="例)駄ヶ谷マンション101">
            </div>
        </div>

        <!-- お問い合わせの種類 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <select class="form__input form__select" name="type">
                    <!-- カテゴリテーブルから取得 -->
                    <option value="">ダミー</option>
                    <!-- categoryテーブルからデータを取得 -->
                </select>
            </div>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <!-- この中に入力部分を実装 -->
                <textarea class="form__input form__textarea" name="content" placeholder="お問い合わせ内容をご記入ください"></textarea>
            </div>
        </div>

        <div class="form__button">
            <button class="form__button--submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection