<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class superAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'pseudo' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'max:100'],
        ];
    }
}