<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        $id = $this->route('category');

        return [
            'name' => "required|string|unique:categories,name,{$id}"
        ];
    }
}

use Illuminate\Foundation\Http\FormRequest;
class UpdateCategoryRequest extends FormRequest 
{
    public function authorize(): bool 
    {
        return true; // [cite: 116]
    }

    public function rules(): array 
    {
        $id = $this->route('category'); // [cite: 118]
        
        return [
            'name' => "required|string|unique:categories,name,{$id}" // [cite: 120, 121]
        ];
    }
}