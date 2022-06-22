<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsEntityRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:10|max:100',
            'body' => 'required|min:10|max:1000',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'publication_date' => 'required|min:10|max:150',
            'is_published' => 'required',
        ];
    }
}
