<?php

namespace App\Http\Controllers;

use App\Models\Worklist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorklistController extends Controller
{
    public function index()
    {
        try {
            $worklists = Worklist::all();

            return response()->json($worklists, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $worklist = new Worklist();
            $worklist->referencia = $request->input('referencia');
            $worklist->garment_type_id = $request->input('garment_type_id');
            $worklist->size_id = $request->input('size_id');
            $worklist->color_id = $request->input('color_id');
            $worklist->fecha_elaboracion = $request->input('fecha_elaboracion');
            $worklist->cantidad_unidades = $request->input('cantidad_unidades');
            $worklist->observation = $request->input('observation', null);
            $worklist->save();

            return response()->json($worklist, 201);
        } catch (Exception $e) {
            if ($e instanceof QueryException && $e->getCode() === '23502') {
                return response()->json(['error' => 'Referencia already exists'], 400);
            } elseif ($e instanceof ModelNotFoundException) {
                return response()->json(['error' => 'Garment type, size, or color not found'], 404);
            } else {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function show($id)
    {
        try {
            $worklist = Worklist::findOrFail($id);

            return response()->json($worklist, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $worklist = Worklist::findOrFail($id);

            $worklist->referencia = $request->input('referencia', $worklist->referencia);
            $worklist->garment_type_id = $request->input('garment_type_id', $worklist->garment_type_id);
            $worklist->size_id = $request->input('size_id', $worklist->size_id);
            $worklist->color_id = $request->input('color_id', $worklist->color_id);
            $worklist->fecha_elaboracion = $request->input('fecha_elaboracion', $worklist->fecha_elaboracion);
            $worklist->cantidad_unidades = $request->input('cantidad_unidades', $worklist->cantidad_unidades);
            $worklist->observation = $request->input('observation', $worklist->observation);
            $worklist->updated_at = now();
            $worklist->save();

            return response()->json($worklist, 200);
        } catch (Exception $e) {
            if ($e instanceof ModelNotFoundException) {
                return response()->json(['error' => 'Worklist not found'], 404);
            } else {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function destroy($id)
    {
        try {
            $worklist = Worklist::findOrFail($id);
            $worklist->delete();

            return response()->json(['message' => 'Worklist deleted'], 200);
        } catch (Exception $e) {
            if ($e instanceof ModelNotFoundException) {
                return response()->json(['error' => 'Worklist not found'], 404);
            } else {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
}
