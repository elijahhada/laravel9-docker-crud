<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsEntityRequest extends FormRequest
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
        $rules = [];

        if($this->request->has('title')) {
            $rules['title'] = 'required|min:3|max:50';
        }
        if($this->request->has('description')) {
            $rules['description'] = 'required|min:10|max:100';
        }
        if($this->request->has('body')) {
            $rules['body'] = 'required|min:10|max:1000';
        }
        if($this->request->has('image')) {
            $rules['image'] = 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048';
        }
        if($this->request->has('publication_date')) {
            $rules['publication_date'] = 'required|min:10|max:150';
        }
        if($this->request->has('is_published')) {
            $rules['is_published'] = 'required';
        }

        return $rules;
    }
}
