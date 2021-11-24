<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|max:255|unique:users',
            'password' => 'required|confirmed|min:6|max:16',
            'security_question_id' => 'required|string|max:6',
            'security_answer' => 'required|string|max:255',
        ];
    }
}
