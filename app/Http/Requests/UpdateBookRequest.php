<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'ISBN' => 'sometimes|string|size:13|unique:books,ISBN,' . $this->ISBN . ',ISBN',
            'title' => 'sometimes|string|max:50',
            'price' => 'sometimes|numeric|min:0|max:99.99',
            'mortgage' => 'sometimes|numeric|min:0|max:999.99',
            'authorship_date ' => 'nullable|date',
            'category_id'=>'sometimes|required|exist:categories,id'
        ];
    }
}
