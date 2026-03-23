@extends('layout.app-layout')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('button')
<div class="header-button-group">
    <a href="/" class="header-button">Logout</a>
</div>
@endsection

@section('content')
<div class="contact-table__content">
    <div class="contact-table__heading">
        <h2>Admin</h2>
    </div>
    <div class="contact-table__group">
        <div class="contact-table__search">
            <form action="" class="search-form">
                <input type="text" class="search-input">
                <select name="" id="" class="search-select__gender">
                    <option value="">性別</option>
                </select>
                <select name="" id="" class="search-select__category">
                    <option value="">お問い合わせの種類</option>
                </select>
                <input class="search-date" type="date" value="">
                <button class="search-button">検索</button>
                <div class="search-button__reset">
                    <a href="/admin" class="reset-button">リセット</a>
                </div>
            </form>
        </div>
        <div class="contact-export">
            <form action="" class="form-export">
                <button class="button-export">エクスポート</button>
            </form>
            <div class="contact-page">
                <p>ページネーション</p>
            </div>
        </div>
        <div class="contact-table__main">
            <table class="table">
                <tr class="table__heading">
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせ種類</th>
                    <th></th>
                </tr>
                <tr class="table-item">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <button class="table-item__button">詳細</button>
                        <dialog class="table-item__dialog">
                            <table class="dialog-table">
                                <tr class="dialog-table__item">
                                    <th>お名前</th>
                                    <td>山田太郎</td>
                                </tr>
                                <tr class="dialog-table__item">
                                    <th>性別</th>
                                    <td>男性</td>
                                </tr>
                                <tr class="dialog-table__item">
                                    <th>メールアドレス</th>
                                    <td>test@example.com</td>
                                </tr>
                                <tr class="dialog-table__item">
                                    <th>電話番号</th>
                                    <td>09012345678</td>
                                </tr>
                                <tr class="dialog-table__item">
                                    <th>住所</th>
                                    <td>東京都</td>
                                </tr>
                                <tr class="dialog-table__item">
                                    <th>建物名</th>
                                    <td>
                                        マンション
                                    </td>
                                </tr>
                                <tr class="dialog-table__item">
                                    <th>お問い合わせの種類</th>
                                    <td>商品について</td>
                                </tr>
                                <tr class="dialog-table__item">
                                    <th>お問い合わせ内容</th>
                                    <td>商品を交換してください</td>
                                </tr>
                            </table>
                        </dialog>
                    </th>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection