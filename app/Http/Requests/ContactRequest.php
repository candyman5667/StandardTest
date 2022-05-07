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
        if($this->path()=='/contact'){
            return true;
        }else
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'integer',
            'fullname'=>'required|',
            'gender'=>'required|nurmeric',
            'email'=>'required|email|max:255',
            'postcode'=>'required|regex:/^[0-9]{3}-[0-9]{4}$/',
            'address'=>'required|max:255',
            'building_name'=>'nullable|max:255',
            'opinion'=>'required|text|max:120',
            'created_at'=>'timestamp',
            'update_at'=>'timestampp',
            
        ];
    }
    public function message()
    {
        return[
            'fullname.required' => '※名前を入力してください',
            'gender.required' =>'※性別を選択してください',
            'email.required' => '※メールアドレスを入力してください',
            'email.email' => '※メールアドレスの形式で入力してください',
            'postcode.required' => '※郵便番号を入力してください',
            'postcode.regex' => '※郵便番号は例の形式で入力してください',
            'address.required' => '※住所を入力してください',
            'opinion.required' => '※ご意見を入力してください',
            'opinion.max' => '※は120字以内で入力してください',
        ];
    }
}
