<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ISBN' => 'required|string|size:13|unique:books,ISBN',                 
            'title' => 'required|string|max:50',
            'price' => 'required|numeric|min:0|max:99.99', 
            'mortgage' => 'required|numeric|min:0|max:999.99', 
            'authorship_date ' => 'nullable|date',
            'category_id'=>'required|exist:categories,id'
        ];
    }
    public function messages():array
    {
        return[
            'title.required' => 'title is very important'
        ];
    }
}
