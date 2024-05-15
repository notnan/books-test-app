<?php

namespace App\Http\Requests\Book\API;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'author' => 'required|string',
            'pub_year' => 'nullable|integer',
            'description' => 'nullable|string',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо заполнить',
            'title.string' => 'Это поле должно быть строкой',
            'author.required' => 'Это поле необходимо заполнить',
            'author.string' => 'Это поле должно быть строкой',
            'pub_year.integer' => 'Это поле должно быть числом',
            'description.string' => 'Это поле должно быть строкой',
        ];
    }
}
