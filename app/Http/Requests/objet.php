<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class objet extends FormRequest
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
            'siteId' => ['required', 'integer'],
            'name' => ['require', 'string', 'max:100'],
            'dernier_lavage' => ['require'],
        ];
    }
}