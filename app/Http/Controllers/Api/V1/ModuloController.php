<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Modulo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModuloResource;
use Illuminate\Support\Facades\Validator;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::all();
        return ModuloResource::collection($modulos);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string',
            // Agregar aquí las demás validaciones para los campos
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $modulo = Modulo::create($request->all());

        return new ModuloResource($modulo);
    }

    public function show($id)
    {
        $modulo = Modulo::findOrFail($id);
        return new ModuloResource($modulo);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string',
            // Agregar aquí las demás validaciones para los campos
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $modulo = Modulo::findOrFail($id);
        $modulo->update($request->all());

        return new ModuloResource($modulo);
    }

    public function destroy($id)
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->delete();

        return response()->json(null, 204);
    }
}























