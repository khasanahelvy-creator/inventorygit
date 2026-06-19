<?php
namespace App\Http\Requests;
feature/auth-sanctum
use Illuminate\Foundation\Http\FormRequest; // 
class StoreItemRequest extends FormRequest // [cite: 172]
{
    public function authorize() // [cite: 173]
    {
        return true; // [cite: 174]
      
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest {

    public function authorize() {
        return true;
main
    }
    protected function prepareForValidation() // [cite: 177]
    {
        $input = $this->all(); // [cite: 179]
        // Melakukan perulangan untuk membersihkan setiap input bertipe string
        array_walk($input, function (&$val) { // [cite: 180]
            if (is_string($val)) { // [cite: 181]
                $val = trim(strip_tags($val)); // 
            }
        }); // [cite: 183]
        // Memasukkan kembali data yang sudah bersih ke dalam request
        $this->merge($input); // [cite: 185]
    }
    public function rules() // [cite: 186]
    {
        return [ // [cite: 187]
            "name"        => "required|string|max:255", // [cite: 188]
            "quantity"    => "required|integer|min:0", // [cite: 189]
            "price"       => "required|numeric|min:0", // [cite: 190]
            "category_id" => "required|exists:categories,id", // [cite: 191]
        ]; // [cite: 192]
    } // [cite: 193]
    public function messages() // [cite: 194]
    {
        return [ // [cite: 196]
            "name.required" => "Nama item wajib diisi.", // [cite: 198]
        ]; // [cite: 197]
    }
}

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