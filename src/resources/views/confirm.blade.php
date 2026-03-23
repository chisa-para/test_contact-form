@extends('layout.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>confirm</h2>
  </div>
  <form action="/thanks" class="form__content">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <div class="confirm-table__name">
              <input type="text" name="last_name" value="{{ $contacts["last_name"] }}" readonly/>
              <input type="text" name="first_name" value="{{ $contacts["first_name"] }}" readonly/>
            </div>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            <input class="input-gender" type="text" name="gender_text" value="@if( $contacts["gender"] == 1 )男性@elseif( $contacts["gender"] == 2 )女性@elseその他@endif" readonly />
            <input type="hidden" name="gender" value="{{ $contacts["gender"] }}" />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contacts["email"] }}" readonly/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" name="tel" value="{{ $contacts["tel_1"].$contacts["tel_2"].$contacts["tel_3"] }}" readonly/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contacts["address"] }}" readonly/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contacts["building"] }}" readonly/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <p>{{ $categories["content"] }}</p>
            <input type="hidden" name="category_id" value="{{ $categories["id"] }}" readonly/>
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contacts["detail"] }}" readonly/>
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
      <a href="" class="form__edit">修正</a>
    </div>
  </form>
</div>
@endsection