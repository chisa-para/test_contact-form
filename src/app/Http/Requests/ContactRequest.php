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
            'last_name' => ['required','string','max:8'],
            'first_name' => ['required','string','max:8'],
            'gender' => ['required','integer','in:1,2,3'],
            'email' => ['required','email'],
            'tel_1' => ['required','numeric','digits_between:1,5'],
            'tel_2' => ['required','numeric','digits_between:1,5'],
            'tel_3' => ['required','numeric','digits_between:1,5'],
            'address' => ['required'],
            'category' => ['required'],
            'detail' => ['required','max:120'],
        ];
    }

    public function messages()
    {
        return[
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '姓を文字列で入力してください',
            'last_name.max' => '姓は最大8文字までで入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名を文字列で入力してください',
            'first_name.max' => '名は最大8文字までで入力してください',
            'gender.required' => '性別を選択してください',
            'gender.integer' => '既定の型と異なったデータです',
            'gender.in1:2:3' => '既定の型と異なったデータです',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel_1.required' => '電話番号を入力してください',
            'tel_1.numeric' => '電話番号を半角数字で入力してください',
            'tel_1.digits_between' => '電話番号は各5桁までで入力してください',
            'tel_2.required' => '電話番号を入力してください',
            'tel_2.numeric' => '電話番号を半角数字で入力してください',
            'tel_2.digits_between' => '電話番号は各5桁までで入力してください',
            'tel_3.required' => '電話番号を入力してください',
            'tel_3.numeric' => '電話番号を半角数字で入力してください',
            'tel_3.digits_between' => '電話番号は各5桁までの半角数字で入力してください',
            'address.required' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は最大120文字以内で入力してください',
        ];
    }
}
