<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last-name' => ['required','string','max:8'],
            'first-name' => ['required','string','max:8'],
            'gender' => ['required'],
            'email' => ['required','email'],
            'tel' => ['required','alpha_dash','max:5'],
            'address' => ['required'],
            'category' => ['required'],
            'detail' => ['required','max:120'],
        ];
    }

    public function messages()
    {
        return[
            'last-name.required' => '姓を入力してください',
            'last-name.string' => '姓を文字列で入力してください',
            'last-name.max' => '姓は最大8文字までで入力してください',
            'first-name.required' => '名を入力してください',
            'first-name.string' => '名を文字列で入力してください',
            'first-name.max' => '名は最大8文字までで入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.alpha_dash' => '電話番号を半角英数字で入力してください',
            'tel.max' => '電話番号は5桁までで数字で入力してください',
            'address.required' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は最大120文字以内で入力してください',
        ];
    }
}
