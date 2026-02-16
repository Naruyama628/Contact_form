@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact">
    <!-- セクションタイトル -->
    <h2 class="contact__title">
        Contact
    </h2>

    <form action="/confirm" method="post" class="form" novalidate>
        @csrf
        <!-- お名前 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-wrapper">
                    <input type="text" class="form__input form__input--text" name="last_name" placeholder="例)山田" value="{{ old('last_name') }}">
                    @error('last_name')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__input-wrapper">
                    <input type="text" class="form__input form__input--text" name="first_name" placeholder="例)太郎" value="{{ old('first_name') }}">
                    @error('first_name')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-wrapper">
                    <div class="form__input-wrapper--radio">
                        <label class="radio-button">
                            <input type="radio" class="form__input form__input--radio" name="gender" value="1" {{ old('gender', '') == '1' ? 'checked' : ''}}>
                            <span class="radio-button__circle"></span>
                            <span class="radio-button__text">男性</span>
                        </label>
                        <label class="radio-button">
                            <input type="radio" class="form__input form__input--radio" name="gender" value="2" {{ old('gender', '') == '2' ? 'checked' : ''}}>
                            <span class="radio-button__circle"></span>
                            <span class="radio-button__text">女性</span>
                        </label>
                        <label class="radio-button">
                            <input type="radio" class="form__input form__input--radio" name="gender" value="3" {{ old('gender', '') == '3' ? 'checked' : ''}}>
                            <span class="radio-button__circle"></span>
                            <span class="radio-button__text">その他</span>
                        </label>
                    </div>
                    @error('gender')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- メールアドレス -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-wrapper">
                    <input type="email" class="form__input form__input--text" name="email" placeholder="例)test@example.com" value="{{ old('email') }}">
                    @error('email')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- 電話番号 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content form__group-content--tel">
                <div class="form__input-wrapper">
                    <input type="tel" class="form__input form__input--tel" name="tel_1" placeholder="080" value="{{ old('tel_1') }}">
                    @error('tel_1')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
                <span class="form__sep">-</span>
                <div class="form__input-wrapper">
                    <input type="tel" class="form__input form__input--tel" name="tel_2" placeholder="1234" value="{{ old('tel_2') }}">
                    @error('tel_2')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
                <span class="form__sep">-</span>
                <div class="form__input-wrapper">
                    <input type="tel" class="form__input form__input--tel" name="tel_3" placeholder="5678" value="{{ old('tel_3') }}">
                    @error('tel_3')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- 住所 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-wrapper">
                    <input type="text" class="form__input form__input--text" name="address" placeholder="例)東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    @error('address')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-wrapper">
                    <input type="text" class="form__input form__input--text" name="building" placeholder="例)駄ヶ谷マンション101" value="{{ old('building') }}">
                    @error('building')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- お問い合わせの種類 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-wrapper">
                    <select class="form__input form__select" name="category_id" value="{{ old('category_id') }}">
                        <option value="" selected hidden>選択してください</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}" @if( old('category_id') == $category['id'] ) selected @endif > {{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form__group">
            <div class="form__group-label">
                <span class="form__label">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input-wrapper">
                    <textarea class="form__input form__textarea" name="detail" placeholder="お問い合わせ内容をご記入ください">{{old('detail')}}</textarea>
                    @error('detail')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__button">
            <button class="form__button--submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection