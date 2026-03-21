@extends('layout.app-layout')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('button')
<div class="header-button-group">
    <a href="/register" class="header-button">Register</a>
</div>
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>Login</h2>
    </div>
    <div class="form__group">
        <form action="" class="form">
            <div class="form__group-title">
                <p class="form__label--item">メールアドレス</p>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例：test@example.com" />
                </div>
                <div class="form__error">
                    <!--バリデーション機能を実装したら記述します。-->
                </div>
            </div>
            <div class="form__group-title">
                <p class="form__label--item">パスワード</p>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="password" placeholder="例：coachtech1106" />
                </div>
                <div class="form__error">
                    <!--バリデーション機能を実装したら記述します。-->
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection