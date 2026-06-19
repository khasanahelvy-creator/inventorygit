<?php
namespace App\Http\Requests;
feature/auth-sanctum
use Illuminate\Contracts\Validation\ValidationRule;
main
use Illuminate\Foundation\Http\FormRequest;
class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    protected function prepareForValidation()
    {
        $input = $this->all();
        array_walk($input, function (&$val) {
            if (is_string($val)) {
                $val = trim(strip_tags($val));
            }
        });
        $this->merge($input);
    }
    public function rules()
    {
        return [
            "name" => "required|string|max:255",
        ];
    }
feature/auth-sanctum
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
main
}