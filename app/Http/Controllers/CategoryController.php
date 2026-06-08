<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use App\Http\Controllers\Api\BaseController; // Wajib di-import [cite: 138]
use Exception;

class CategoryController extends BaseController // Diubah dari Controller ke BaseController [cite: 138]
{
    protected CategoryService $svc;
    public function __construct(CategoryService $svc) {
        $this->svc = $svc;  }
    public function index(){
        return $this->success($this->svc->all()); // Memakai wrapper success() [cite: 146]
    }
    public function store(StoreCategoryRequest $req){
        $cat = $this->svc->create($req->validated());
        return $this->success($cat, "Kategori dibuat", 201); // Status 201 Created [cite: 149, 150]
    }
    public function show($id){
        try {
            $cat = $this->svc->find($id);
            return $this->success($cat); // Memakai wrapper success() [cite: 153, 154, 155]
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 404); // Status 404 Not Found [cite: 156, 158]
        }
    }
    public function update(UpdateCategoryRequest $req, $id){
        $cat = $this->svc->update($id, $req->validated());
        return $this->success($cat, "Kategori diperbarui"); // Memakai wrapper success() [cite: 161, 162]
    }
    public function destroy($id){
        $this->svc->delete($id);
        return $this->success(null, "Kategori dihapus", 204); // Status 204 No Content [cite: 165, 166]
    }
}
