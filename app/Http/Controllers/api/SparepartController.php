<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SparepartController extends Controller
{
    public function index()
    {
        $data = Sparepart::all();

        return response()->json([
           'status' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = new Sparepart();

        $rules = [
            "name" => "required",
            "category" => "required",
            "harga" => "required"

        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;
        $data->category = $request->category;
        $data->harga = $request->harga;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Sparepart::find($id);
        
        if($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Sparepart::find($id);

        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan update'
            ], 404);
        }

        $rules = [
            "name" => "required",
            "category" => "required",
            "harga" => "required"

        ];

        $validator = FacadesValidator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan update',
                'data' => $validator->errors()
            ], 400);
        }

        $data->name = $request->name;
        $data->category = $request->category;
        $data->harga = $request->harga;

        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diubah'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sparepart::find($id);

        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ], 201);
    }
}
