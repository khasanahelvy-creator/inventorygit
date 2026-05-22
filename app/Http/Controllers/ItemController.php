<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Services\ItemService;
use Exception;

class ItemController extends Controller 
{
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