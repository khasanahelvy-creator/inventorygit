<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use Exception;

class ItemController extends Controller 
    {
    protected ItemService $svc;
    }
    public function __construct(ItemService $svc)
    {
        $this->svc = $svc;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'status'  => 'success',
            'data'    => $this->svc->all(),
            'message' => 'Berhasil menarik semua data Item'
        ]);
    }

    public function store(StoreItemRequest $req): JsonResponse
    {
        $item = $this->svc->create($req->validated());

        return response()->json([
            'status'  => 'success',
            'data'    => $item,
            'message' => 'Item berhasil dibuat'
        ], 201);
    }

    public function show(int $id): JsonResponse
        try {
            $item = $this->svc->find($id);

            return response()->json([
                'status'  => 'success',
                'data'    => $item,
                'message' => 'Berhasil menarik satu data Item'
            ]);
        } catch (\Exception $e) 
            return response()->json([
                'status'  => 'error',
                'data'    => null,
                'message' => $e->getMessage()
            ]);

    protected ItemService $svc; // [cite: 170]

    public function __construct(ItemService $svc) 
    {
        $this->svc = $svc; // [cite: 173]
    }

    public function index() 
    {
        return response()->json([
            'status'  => 'success', // [cite: 177]
            'data'    => $this->svc->all(), // [cite: 180]
            'message' => 'Berhasil menarik semua data Item' // [cite: 181]
        ]);
    }

    public function store(StoreItemRequest $req) // [cite: 182]
    {
        $item = $this->svc->create($req->validated()); // [cite: 184]
        return response()->json([
            'status'  => 'success', // [cite: 188]
            'data'    => $item, // [cite: 189]
            'message' => 'Item berhasil dibuat' // [cite: 190]
        ], 201);
    }

    public function show($id) 
    {
        try { // [cite: 193]
            $item = $this->svc->find($id); // [cite: 194]
            return response()->json([
                'status'  => 'success', // [cite: 198]
                'data'    => $item, // [cite: 199]
                'message' => 'Berhasil menarik satu data Item' // [cite: 200]
            ]);
        } catch (Exception $e) { // [cite: 202]
            return response()->json([
                'status'  => 'error', // [cite: 204]
                'data'    => null, // [cite: 206]
                'message' => $e->getMessage() // [cite: 207]
            ], 404);
        }
    }

    public function update(UpdateItemRequest $req, int $id): JsonResponse
    {
        $item = $this->svc->update($id, $req->validated());

        return response()->json([
            'status'  => 'success',
            'data'    => $item,
            'message' => 'Item berhasil diperbarui'
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->svc->delete($id);

        return response()->json([
            'status'  => 'success',
            'data'    => null,
            'message' => 'Item berhasil dihapus'
        ], 204);

    public function update(UpdateItemRequest $req, $id) // [cite: 211]
    {
        $item = $this->svc->update($id, $req->validated()); // [cite: 212]
        return response()->json([
            'status'  => 'success', // [cite: 214]
            'data'    => $item, // [cite: 216]
            'message' => 'Item berhasil diperbarui' // [cite: 217]
        ]);
    }

    public function destroy($id) 
    {
        $this->svc->delete($id); // [cite: 221]
        return response()->json([
            'status'  => 'success', // [cite: 223]
            'data'    => null, // [cite: 226]
            'message' => 'Item berhasil dihapus' // [cite: 227]
        ], 200);
    }
}