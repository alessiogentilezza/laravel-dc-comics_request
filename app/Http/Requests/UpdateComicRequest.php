<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'nullable|min:10|max:2000',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric',
            'series' => 'required|max:100',
            'sale_date' => 'required',
            'type' => 'required|max:30',
        ];
    }
    public function messages()
    {
        return [
            // 'title.required' => "Il campo Titolo è obbligatorio",
            // 'title.max' => "Il campo Titolo può contenere al massimo 255 caratteri",
        ];
    }

}
