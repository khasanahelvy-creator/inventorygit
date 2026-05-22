<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

class ItemService 
{
    public function all(): Collection 
    {
        return Item::with('category')->get(); // [cite: 130]
    }

    public function find(int $id): Item 
    {
        return Item::with('category')->findOrFail($id); // [cite: 133]
    }

    public function create(array $data): Item 
    {
        return Item::create($data); // [cite: 136]
    }

    public function update(int $id, array $data): Item 
    {
        $item = Item::findOrFail($id); // [cite: 138]
        $item->update($data); // [cite: 139]
        return $item; // [cite: 141]
    }

    public function delete(int $id): void 
    {
        Item::destroy($id); // [cite: 143]
    }
}