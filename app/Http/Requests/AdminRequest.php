<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            "id" => "required|integer",
            "password" => "required",
            "confirm" => "confirmed",
        ];
    }

    public function messsages(){
        return [
            "id.required" => "必ず入力してください",
            "password.required" => "必ず入力してください",
            "id.integer" => "数字で入力してください",
            "confirm.confirmed" => "パスワードと同じ値ではありません",
        ];
    }
}
