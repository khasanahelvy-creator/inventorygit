<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use App\Http\Controllers\Api\BaseController;
use Exception;

class ItemController extends BaseController 
{
    protected ItemService $svc;

    /**
     * Constructor untuk dependency injection ItemService.
     */
    public function __construct(ItemService $svc) 
    {
        $this->svc = $svc;
    }

    /**
     * GET /api/v1/items
     * Mengambil semua daftar item dengan filter category_id sesuai Modul VI.
     */
    public function index(Request $request)
    {
        // Menyaring data item menggunakan metode collection filter dari Modul VI
        $items = $this->svc->all()->filter(fn($item) =>
            !$request->category_id
            || $item->category_id == $request->category_id
        );

        // values() digunakan untuk mengatur ulang indeks array JSON agar konsisten di Postman
        return $this->success($items->values());
    }

    /**
     * POST /api/v1/items
     * Menyimpan data item baru ke database.
     */
    public function store(StoreItemRequest $req)
    {
        $item = $this->svc->create($req->validated());
        return $this->success($item, "Item berhasil dibuat", 201);
    }

    /**
     * GET /api/v1/items/{id}
     * Mengambil satu data item berdasarkan ID.
     */
    public function show($id)
    {
        try {
            $item = $this->svc->find($id);
            return $this->success($item, "Berhasil menarik satu data Item");
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 404);
        }
    }

    /**
     * PUT/PATCH /api/v1/items/{id}
     * Mengubah data item yang sudah ada.
     */
    public function update(UpdateItemRequest $req, $id)
    {
        $item = $this->svc->update($id, $req->validated());
        return $this->success($item, "Item berhasil diperbarui");
    }

    /**
     * DELETE /api/v1/items/{id}
     * Menghapus data item berdasarkan ID.
     */
    public function destroy($id)
    {
        $this->svc->delete($id);
        return $this->success(null, "Item berhasil dihapus", 200);
    }
}