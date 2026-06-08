<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use App\Http\Controllers\Api\BaseController; // Wajib di-import [cite: 106]
use Exception;
class ItemController extends BaseController // Diubah dari Controller ke BaseController [cite: 106]
{
    protected ItemService $svc;
    public function __construct(ItemService $svc) {
        $this->svc = $svc; } // Perbaikan posisi kurung dari modul [cite: 107, 109]  
    public function index() {
        return $this->success($this->svc->all());} // Memakai wrapper success() [cite: 112]
    public function store(StoreItemRequest $req){
        $item = $this->svc->create($req->validated());
        return $this->success($item, "Item dibuat", 201);} // Status 201 Created [cite: 115, 116]
    public function show($id){
        try {
            $item = $this->svc->find($id);
            return $this->success($item); // Memakai wrapper success() [cite: 119, 120]
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 404); // Status 404 Not Found [cite: 121, 123]
        }
    }
    public function update(UpdateItemRequest $req, $id)
    {
        $item = $this->svc->update($id, $req->validated());
        return $this->success($item, "Item diperbarui"); // Memakai wrapper success() [cite: 124, 126]
    }
    public function destroy($id)
    {
        $this->svc->delete($id);
        return $this->success(null, "Item dihapus", 204); // Status 204 No Content [cite: 130, 131]
    }
}
