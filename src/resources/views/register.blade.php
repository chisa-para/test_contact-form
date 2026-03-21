@extends('layout.app-layout')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('button')
<div class="header-button-group">
    <a href="/login" class="header-button">Login</a>
</div>
@endsection

@section('content')
<div class="register-form__content">
    <div class="register-form__heading">
        <h2>Register</h2>
    </div>
    <div class="form__group">
        <form action="" class="form">
            <div class="form__group-title">
                <p class="form__label--item">お名前</p>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" placeholder="例：山田太郎" />
                </div>
                <div class="form__error">
                    <!--バリデーション機能を実装したら記述します。-->
                </div>
            </div>
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