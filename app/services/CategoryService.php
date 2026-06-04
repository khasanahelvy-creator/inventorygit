<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService 
    {public function all(): Collection}
    {
        return Category::all();
    }

    public function find(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(int $id, array $data): Category
    {
        $cat = Category::findOrFail($id);
        $cat->update($data);

        return $cat;
    }

    public function delete(int $id): void

        Category::destroy($id);
class CategoryService 
{
    public function all(): Collection 
    {
        return Category::all(); // [cite: 151]
    }

    public function find(int $id): Category 
    {
        return Category::findOrFail($id); // [cite: 155]
    }

    public function create(array $data): Category 
    {
        return Category::create($data); // [cite: 158]
    }

    public function update(int $id, array $data): Category 
    {
        $cat = Category::findOrFail($id); // [cite: 160]
        $cat->update($data); // [cite: 161]
        return $cat; // [cite: 163]
    }

    public function delete(int $id): void 
    {
        Category::destroy($id); // [cite: 165]
    }
}