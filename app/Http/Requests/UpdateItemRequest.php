<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name'        => 'sometimes|required|string|max:255',
            'quantity'    => 'sometimes|required|integer|min:0',
            'price'       => 'sometimes|required|numeric|min:0',
            'category_id' => 'sometimes|required|exists:categories,id',
        ];
    }

    public function messages() {
        return [
            'sometimes.required' => 'Field ini diperlukan saat diubah.',
        ];
    }
}

use Illuminate\Foundation\Http\FormRequest;
class UpdateItemRequest extends FormRequest 
{
    public function authorize(): bool 
    {
        return true; // [cite: 74]
    }

    public function rules(): array 
    {
        return [
            'name'        => 'sometimes|required|string|max:255', // [cite: 77, 79]
            'quantity'    => 'sometimes|required|integer|min:0',    // [cite: 78, 79]
            'price'       => 'sometimes|required|numeric|min:0',    // [cite: 78, 80]
            'category_id' => 'sometimes|required|exists:categories,id', // [cite: 81, 82]
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required'        => 'Field ini diperlukan saat diubah.', // [cite: 87, 88]
            'quantity.integer'     => 'Jumlah harus angka bulat.',
            'price.numeric'        => 'Harga harus berupa angka.',
            'category_id.exists'   => 'Kategori tidak ditemukan.'
        ];
    }
}
>>>>>>> b24ff970b084db9823e9b62d60f7c8150963ea0d
