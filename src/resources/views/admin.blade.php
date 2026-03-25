@extends('layout.app-layout')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('button')
@if (Auth::check())
<div class="header-button-group">
    <form action="/logout" class="header-button" method="post">
        @csrf
        <button>Logout</button>
    </form>
</div>
@endif
@endsection

@section('content')
<div class="contact-table__content">
    <div class="contact-table__heading">
        <h2>Admin</h2>
    </div>
    <div class="contact-table__group">
        <div class="contact-table__search">
            <form action="/search" class="search-form" method="get">
                @csrf
                <input name="keyword" type="text" class="search-input" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
                <select name="gender" id="" class="search-select__gender">
                    <option value="" selected>性別(全て)</option>
                    <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                </select>
                <select name="category_id" id="" class="search-select__category">
                    <option value="" selected>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option  value="{{ $category->id }}"{{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                    @endforeach
                </select>
                <input name="date" class="search-date" type="date" value="{{ request('date') }}">
                <button class="search-button">検索</button>
                <div class="search-button__reset">
                    <a href="/admin" class="reset-button">リセット</a>
                </div>
            </form>
        </div>
        <div class="contact-export">
            <form action="/admin/export" class="form-export">
                @csrf
                @foreach(request()->query() as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <button class="button-export">エクスポート</button>
            </form>
            <div class="contact-page">
                {{ $contacts->links() }}
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
                @foreach($contacts as $contact)
                <tr class="table-item">
                    <td>{{ $contact->last_name }}{{ $contact->first_name }}</td>
                    <td>
                        @if($contact->gender == 1) 男性 @elseif($contact->gender == 2) 女性 @else その他 @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td>
                        <button class="table-item__button"
                        data-id="{{ $contact->id }}"
                        data-last_name="{{ $contact->last_name }}"
                        data-first_name="{{ $contact->first_name }}"
                        data-gender="{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}"
                        data-email="{{ $contact->email }}"
                        data-tel="{{ $contact->tel }}"
                        data-address="{{ $contact->address }}"
                        data-building="{{ $contact->building }}"
                        data-category="{{ $contact->category->content }}"
                        data-detail="{{ $contact->detail }}"
                        onclick="openModal(this)">
                        詳細
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <dialog id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>
            <h2>お問い合わせ詳細</h2>
            <table class="detail-table">
                <tr>
                    <th>お名前</th>
                    <td id="modal-name"></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td id="modal-gender"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td id="modal-email"></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td id="modal-tel"></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td id="modal-address"></td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td id="modal-building"></td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td id="modal-category"></td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td id="modal-detail" style="white-space: pre-wrap;"></td>
                </tr>
            </table>
            <form id="delete-form" action="/admin/delete/{id}" method="post" onsubmit="return confirm('本当に削除しますか？')">
                @csrf
                @method('DELETE')
                <button type="submit" class="button-delete">削除</button>
            </form>
        </div>
    </dialog>
<script>
    function openModal(button) {
        
        const lastName = button.getAttribute('data-last_name');
        const firstName = button.getAttribute('data-first_name');
        const gender = button.getAttribute('data-gender');
        const email = button.getAttribute('data-email');
        const tel = button.getAttribute('data-tel');
        const address = button.getAttribute('data-address');
        const building = button.getAttribute('data-building');
        const category = button.getAttribute('data-category');
        const detail = button.getAttribute('data-detail');

        document.getElementById('modal-name').innerText = lastName + ' ' + firstName;
        document.getElementById('modal-gender').innerText = gender;
        document.getElementById('modal-email').innerText = email;
        document.getElementById('modal-tel').innerText = tel;
        document.getElementById('modal-address').innerText = address;
        document.getElementById('modal-building').innerText = building || '-';
        document.getElementById('modal-category').innerText = category;
        document.getElementById('modal-detail').innerText = detail;

        const id = button.getAttribute('data-id');
        document.getElementById('delete-form').action = '/admin/delete/' + id;

        const modal = document.getElementById('detailModal');
        modal.style.setProperty('display', 'block', 'important');
    }

    function closeModal() {
        const modal = document.getElementById('detailModal');
        modal.style.setProperty('display', 'none', 'important');
    }


    window.onclick = function(event) {
        const modal = document.getElementById('detailModal');
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
@endsection