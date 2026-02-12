@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <!-- セクションタイトル -->
    <h2 class="section-title">
        Confirm
    </h2>

    <form action="/thanks" method="POST" class="confirm-form" id="confirm">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <!-- お名前 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__content">
                        <input type="text" class="confirm-table__content--input" value="{{$content['last_name'] . ' ' . $content['first_name']}}">
                    </td>
                </tr>

                <!-- 性別 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__content">
                        <!-- valueの数値によって性別表示を変える -->
                        <input type="text" class="confirm-table__content--input" value="{{$content['gender']}}">
                    </td>
                </tr>

                <!-- メールアドレス -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__content">
                        <input type="text" class="confirm-table__content--input" value="{{$content['email']}}">
                    </td>
                </tr>

                <!-- 電話番号 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__content">
                        <input type="text" class="confirm-table__content--input" value="{{$content['tel_1'] . $content['tel_2'] . $content['tel_3']}}">
                    </td>
                </tr>

                <!-- 住所 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__content">
                        <input type="text" class="confirm-table__content--input" value="{{$content['address']}}">
                    </td>
                </tr>

                <!-- 建物名 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__content">
                        <input type="text" class="confirm-table__content--input" value="{{$content['building']}}">
                    </td>
                </tr>

                <!-- お問い合わせの種類 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__content">
                        <input type="text" class="confirm-table__content--input" value="{{$content['type']}}">
                    </td>
                </tr>

                <!-- お名前 -->
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__content">
                        <input type="hidden" class="confirm-table__content--input" value="{{$content['content']}}">
                        <p class="confirm-table__content--text">{{$content['content']}}</p>
                    </td>
                </tr>
            </table>
        </div>
    </form>

    <form action="/correction" method="POST" class="confirm-form" id="correction">
        @csrf
    </form>

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