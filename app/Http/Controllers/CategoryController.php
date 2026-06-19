<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
feature/auth-sanctum
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

use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use Exception;

class CategoryController extends Controller 
    {
    protected CategoryService $svc; // [cite: 231]
    }
    public function __construct(CategoryService $svc) 
    {
        $this->svc = $svc; // [cite: 233]
    }

    public function index() 
    {
        return response()->json([
            'status'  => 'success', // [cite: 239]
            'data'    => $this->svc->all(), // [cite: 242]
            'message' => 'Berhasil menarik semua data Kategori' // [cite: 243]
        ]);
    }

    public function store(StoreCategoryRequest $req) // [cite: 244]
    {
        $cat = $this->svc->create($req->validated()); // [cite: 246]
        return response()->json([
            'status'  => 'success', // [cite: 248]
            'data'    => $cat, // [cite: 250]
            'message' => 'Kategori berhasil dibuat' // [cite: 251]
        ], 201);
    }

    public function show($id) 
    {
        try { // [cite: 254]
            $cat = $this->svc->find($id); // [cite: 256]
            return response()->json([
                'status'  => 'success', // [cite: 258]
                'data'    => $cat, // [cite: 260]
                'message' => 'Berhasil menarik satu data kategori' // [cite: 261]
            ]);
        } catch (Exception $e) { // [cite: 263]
            return response()->json([
                'status'  => 'error', // [cite: 267]
                'data'    => null, // [cite: 268]
                'message' => $e->getMessage() // [cite: 269]
            ], 404);
      main
        }
    }
    public function update(UpdateCategoryRequest $req, $id){
        $cat = $this->svc->update($id, $req->validated());
        return $this->success($cat, "Kategori diperbarui"); // Memakai wrapper success() [cite: 161, 162]
    }
    public function destroy($id){
        $this->svc->delete($id);
      feature/auth-sanctum
        return $this->success(null, "Kategori dihapus", 204); // Status 204 No Content [cite: 165, 166]

        return response()->json([
            'status'  => 'success',
            'data'    => null,
            'message' => 'Kategori berhasil dihapus'
        ], 204);

    public function update(UpdateCategoryRequest $req, $id) // [cite: 271]
    {
        $cat = $this->svc->update($id, $req->validated()); // [cite: 272]
        return response()->json([
            'status'  => 'success', // [cite: 274]
            'data'    => $cat, // [cite: 276]
            'message' => 'Kategori berhasil diperbarui' // [cite: 277]
        ]);
    }

    public function destroy($id) 
    {
        $this->svc->delete($id); // [cite: 281]
        return response()->json([
            'status'  => 'success', // [cite: 282]
            'data'    => null, // [cite: 284]
            'message' => 'Kategori berhasil dihapus' // [cite: 285]
        ], 200);
      main
    }
}
