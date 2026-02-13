@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm">
    <!-- セクションタイトル -->
    <h2 class="confirm__title">
        Confirm
    </h2>

    <div class="table-group">
        <table class="table-group__inner">
            <!-- お名前 -->
            <tr class="table-group__row">
                <th class="table-group__label">お名前</th>
                <td class="table-group__content">
                    <p class="table-group__text">
                        {{ $content['last_name'] . ' ' . $content['first_name']}}
                    </p>
                </td>
            </tr>

            <!-- 性別 -->
            <tr class="table-group__row">
                <th class="table-group__label">性別</th>
                <td class="table-group__content">
                    <!-- valueの数値によって性別表示を変える -->
                    <p class="table-group__text">
                        @php
                            $genderMap = [1 => '男性', 2 => '女性', 3 => 'その他'];
                        @endphp
                        {{ $genderMap[$content['gender']]}}
                    </p>
                </td>
            </tr>

            <!-- メールアドレス -->
            <tr class="table-group__row">
                <th class="table-group__label">メールアドレス</th>
                <td class="table-group__content">
                    <p class="table-group__text">
                        {{ $content['email']}}
                    </p>
                </td>
            </tr>

            <!-- 電話番号 -->
            <tr class="table-group__row">
                <th class="table-group__label">電話番号</th>
                <td class="table-group__content">
                    <p class="table-group__text">
                        {{ $content['tel_1'] . $content['tel_2'] . $content['tel_3']}}
                    </p>
                </td>
            </tr>

            <!-- 住所 -->
            <tr class="table-group__row">
                <th class="table-group__label">住所</th>
                <td class="table-group__content">
                    <p class="table-group__text">
                        {{ $content['address']}}
                    </p>
                </td>
            </tr>

            <!-- 建物名 -->
            <tr class="table-group__row">
                <th class="table-group__label">建物名</th>
                <td class="table-group__content">
                    <p class="table-group__text">
                        {{ $content['building']}}
                    </p>
                </td>
            </tr>

            <!-- お問い合わせの種類 -->
            <tr class="table-group__row">
                <th class="table-group__label">お問い合わせの種類</th>
                <td class="table-group__content">
                    <p class="table-group__text">
                        {{ $content['type']}}
                    </p>
                </td>
            </tr>

            <!-- お名前 -->
            <tr class="table-group__row">
                <th class="table-group__label">お問い合わせ内容</th>
                <td class="table-group__content">
                    <p class="table-group__text">{{$content['content']}}</p>
                </td>
            </tr>
        </table>
    </div>

    <!-- データ送信用フォーム -->
    <form action="/thanks" method="POST" id="confirm">
        @csrf
        @foreach($content as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>

    <form action="/" method="POST" id="correction">
        @csrf
        @foreach($content as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>

    <!-- ボタン -->
    <div class="confirm__button">
        <button class="confirm__button--submit" type="submit" form="confirm">
            送信
        </button>

        <button class="confirm__button--correction" type="submit" form="correction">
            修正
        </button>
    </div>
</div>
@endsection