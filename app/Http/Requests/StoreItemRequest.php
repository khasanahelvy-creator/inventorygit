<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest 
{
    public function authorize(): bool 
    {
        return true; // Diubah menjadi true agar request diizinkan [cite: 12, 48]
    }

    public function rules(): array 
    {
        return [
            'name'        => 'required|string|max:255', // [cite: 51, 52]
            'quantity'    => 'required|integer|min:0',    // [cite: 53, 54]
            'price'       => 'required|numeric|min:0',    // [cite: 55, 56]
            'category_id' => 'required|exists:categories,id', // [cite: 59]
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required'       => 'Nama item wajib diisi.', // [cite: 62, 63]
            'quantity.integer'    => 'Jumlah harus angka bulat.', // [cite: 64]
            'price.numeric'       => 'Harga harus berupa angka.', // [cite: 65]
            'category_id.exists'  => 'Kategori tidak ditemukan.', // [cite: 66]
        ];
    }
}