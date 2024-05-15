<?php

namespace App\Http\Requests\Book\API;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'title' => 'nullable|string',
            'author' => 'nullable|string',
            'from' => 'nullable|integer',
            'to' => 'nullable|integer',
            'description' => 'nullable|string',
        ];
    }


    public function messages()
    {
        return [
            'from.integer' => 'Это поле должно быть числом',
            'to.integer' => 'Это поле должно быть числом',
        ];
    }
}
