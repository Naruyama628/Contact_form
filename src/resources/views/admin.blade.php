@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('auth')
    <form action="/logout" method="get" class="auth-form">
        <button type="submit" class="auth-form__button">
            Logout
        </button>
    </form>
@endsection

@section('content')
<div class="admin">
    <!-- セクションタイトル -->
    <h2 class="admin__title">
        Admin
    </h2>

    <!-- サーチフォーム -->
    <form action="" class="search-form">
        <input type="text" class="search-form__control search-form__control--text" name="text" placeholder="名前やメールアドレスを入力してください">

        <div class="search-form__field">
            <select class="search-form__control search-form__control--narrow" name="gender" placeholder="性別">
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
        </div>

        <div class="search-form__field">
            <select class="search-form__control search-form__control--wide" name="type" placeholder="お問い合わせの種類">
                <!-- カテゴリテーブルから取得 -->
                <option value="">お問い合わせの種類</option>
                <!-- categoryテーブルからデータを取得 -->
            </select>
        </div>

        <div class="search-form__field">
            <input type="date" class="search-form__control search-form__control--date">
        </div>

        <button class="search-form__button">検索</button>
        <button class="search-form__button search-form__button--light">リセット</button>
    </form>

    <!-- ツールバー -->
    <div class="admin__toolbar">
        <button class="admin__export">エクスポート</button>

        <div class="admin__pagination">
        </div>
    </div>

    <!-- 一覧テーブル -->
    <table class="admin-table">
        <!-- ヘッダー -->
        <thead class="admin-table__head">
            <tr class="admin-table__row">
                <th class="admin-table__header">お名前</th>
                <th class="admin-table__header">性別</th>
                <th class="admin-table__header">メールアドレス</th>
                <th class="admin-table__header">お問い合わせの種類</th>
                <th class="admin-table__header"></th>
            </tr>
        </thead>

        <!-- データ一覧 -->
        <tbody class="admin-table__body">
            <!-- foreach -->
            <tr class="admin-table__row">
                <td class="admin-table__data">田中　太郎</td>
                <td class="admin-table__data">男性</td>
                <td class="admin-table__data">abcd19960628@gmail.com</td>
                <td class="admin-table__data admin-table__data--right-borderless">商品の交換について</td>
                <!-- ボタン -->
                <td class="admin-table__data admin-table__data--left-borderless">
                    <button class="admin-table__button" popovertarget="details-modal" popovertargetaction="show">詳細</button>
                </td>
            </tr>
            <!-- endforeach -->
        </tbody>
    </table>

    <!-- 詳細モーダル -->
    <div id="details-modal" popover>
        <div class="close-button">
           <button class="close-button__submit" popovertarget="details-modal"
            popovertargetaction="hide">×</button>
        </div>

        <table class="details-table">
            <tr class="details-table__row">
                <th class="details-table__label">お名前</th>
                <td class="details-table__data">aaaaaa</td>
            </tr>

            <tr class="details-table__row">
                <th class="details-table__label">性別</th>
                <td class="details-table__data"></td>
            </tr>

            <tr class="details-table__row">
                <th class="details-table__label">メールアドレス</th>
                <td class="details-table__data"></td>
            </tr>

            <tr class="details-table__row">
                <th class="details-table__label">電話番号</th>
                <td class="details-table__data"></td>
            </tr>

            <tr class="details-table__row">
                <th class="details-table__label">住所</th>
                <td class="details-table__data"></td>
            </tr>

            <tr class="details-table__row">
                <th class="details-table__label">建物名</th>
                <td class="details-table__data"></td>
            </tr>

            <tr class="details-table__row">
                <th class="details-table__label">お問い合わせの種類</th>
                <td class="details-table__data">aaaaaa</td>
            </tr>

            <tr class="details-table__row">
                <th class="details-table__label">お問い合わせ内容</th>
                <td class="details-table__data"></td>
            </tr>
        </table>
        
        <form action="" class="details-form">
            <!-- hiddenで各種データを入力 -->
            <button class="details-form__submit">削除</button>
        </form>
    </div>
</div>
@endsection

