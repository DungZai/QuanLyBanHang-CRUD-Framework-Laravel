<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|decimal:0,2|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'status' => 'required|boolean'
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'name.required' => 'Tên không được để trống',
            'price.min' => 'Giá không được âm',
            'quantity.min' => 'Số lương không được âm',
            'category_id.exists' => 'Danh mục không tồn tại',
        ];
    }
}
