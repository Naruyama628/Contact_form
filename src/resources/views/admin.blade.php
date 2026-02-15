@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('auth')
    <form action="/logout" method="post" class="auth-form">
        @csrf
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
    <form action="/search" method="GET" class="search-form">
        <input type="text" class="search-form__control search-form__control--text" name="keyword" placeholder="名前やメールアドレスを入力してください">

        <div class="search-form__field">
            <select class="search-form__control search-form__control--narrow" name="gender" placeholder="性別">
                <option value="" selected hidden>性別</option>
                <option value="0">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
        </div>

        <div class="search-form__field">
            <select class="search-form__control search-form__control--wide" name="category_id" placeholder="お問い合わせの種類">
                <option value="" selected hidden>お問い合わせの種類</option>
                @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['content']}}</option>
                @endforeach
            </select>
        </div>

        <div class="search-form__field">
            <input type="date" class="search-form__control search-form__control--date" name="date">
        </div>

        <button class="search-form__button">検索</button>
        <button formaction="/reset" class="search-form__button search-form__button--light">リセット</button>
    </form>

    <!-- ツールバー -->
    <div class="admin__toolbar">
        <button class="admin__export">エクスポート</button>

        <div class="admin__pagination">
            {{ $contents->links() }}
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
            @foreach($contents as $content)
            <tr class="admin-table__row">
                <td class="admin-table__data">{{ $content['last_name'] . ' ' .$content['first_name']}}</td>
                <td class="admin-table__data">{{ $genderMap[$content['gender']] }}</td>
                <td class="admin-table__data">{{ $content['email'] }}</td>
                <td class="admin-table__data admin-table__data--right-borderless">{{ $content['category']['content'] }}</td>
                <!-- ボタン -->
                <td class="admin-table__data admin-table__data--left-borderless">
                    <button class="admin-table__button" popovertarget="details-modal--{{ $content['id']}}" popovertargetaction="show">詳細</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($contents as $content)
        <!-- 詳細モーダル -->
        <div class="details-modal" id="details-modal--{{ $content['id']}}" popover>
            <div class="details-modal__close">
                <button class="details-modal__close--submit" popovertarget="details-modal--{{ $content['id']}}"
                popovertargetaction="hide">×</button>
            </div>

            <table class="details-table">
                <tr class="details-table__row">
                    <th class="details-table__label">お名前</th>
                    <td class="details-table__data">{{ $content['last_name'] . ' ' . $content['first_name']}}</td>
                </tr>

                <tr class="details-table__row">
                    <th class="details-table__label">性別</th>
                    <td class="details-table__data">{{ $genderMap[$content['gender']] }}</td>
                </tr>

                <tr class="details-table__row">
                    <th class="details-table__label">メールアドレス</th>
                    <td class="details-table__data">{{ $content['email']}}</td>
                </tr>

                <tr class="details-table__row">
                    <th class="details-table__label">電話番号</th>
                    <td class="details-table__data">{{ $content['tel']}}</td>
                </tr>

                <tr class="details-table__row">
                    <th class="details-table__label">住所</th>
                    <td class="details-table__data">{{ $content['address']}}</td>
                </tr>

                <tr class="details-table__row">
                    <th class="details-table__label">建物名</th>
                    <td class="details-table__data">{{ $content['building']}}</td>
                </tr>

                <tr class="details-table__row">
                    <th class="details-table__label">お問い合わせの種類</th>
                    <td class="details-table__data">{{ $content['category']['content']}}</td>
                </tr>

                <tr class="details-table__row">
                    <th class="details-table__label">お問い合わせ内容</th>
                    <td class="details-table__data">{{ $content['detail']}}</td>
                </tr>
            </table>
            
            <form action="/delete" method="POST" class="details-form">
                @csrf
                @method('DELETE')
                <input class="details-form__hidden-id" type="hidden" name="id" value="{{ $content['id']}}">
                <button class="details-form__submit">削除</button>
            </form>
        </div>
    @endforeach
</div>
@endsection

