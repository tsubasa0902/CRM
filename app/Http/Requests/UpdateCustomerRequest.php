<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
          return [
            'name' => ['required', 'max:50'],
            'kana' => ['required', 'regex:/^[ァ-ヾ]+$/u','max:50'],
            'tel' => ['required', 'max:20', 'unique:customers,tel,' . $this->customer->id],
            // 自分のemailを変更する場合、uniqueルールを無効にする
            'email' => ['required', 'email', 'max:255', 'unique:customers,email,' . $this->customer->id],
            'postcode' => ['required', 'max:7'],
            'address' => ['required', 'max:100'],
            'birthday' => ['date'],
            'gender' => ['required'],
            'memo' => ['max:1000'],
        ];
    }
    public function messages()
    {
        return [
            'kana.regex' => 'カナは全角カタカナで入力してください。',
        ];
    }
}
