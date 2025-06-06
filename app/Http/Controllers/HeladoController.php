<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeladoRequest;
use App\Models\Helado;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class HeladoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Helado::all(), 200);
    }

    public function show(int $id): JsonResponse
    {
        try {
            $helado = Helado::findOrFail($id);
            return response()->json($helado, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Helado no encontrado'], 404);
        }
    }

    public function store(StoreHeladoRequest $request): JsonResponse
    {
        $helado = Helado::create($request->validated());
        return response()->json($helado, 201);
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $helado = Helado::findOrFail($id);
            $helado->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Helado no encontrado'], 404);
        }
    }
}
