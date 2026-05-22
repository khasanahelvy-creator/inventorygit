<?php

namespace App\Http\Requests;

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