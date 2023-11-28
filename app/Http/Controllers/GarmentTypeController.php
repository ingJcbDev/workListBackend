<?php

namespace App\Http\Controllers;

use App\Models\GarmentType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GarmentTypeController extends Controller
{
    public function index()
    {
        try {
            $garmentType = GarmentType::all();

            return response()->json($garmentType, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function show($id)
    {
        try {
            $garmentType = GarmentType::findOrFail($id);

            return response()->json($garmentType, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $garmentType = new GarmentType();
            $garmentType->description = $request->input('description');
            $garmentType->status = $request->input('status');
            $garmentType->save();

            return response()->json($garmentType, 201);
        } catch (Exception $e) {
            if ($e instanceof QueryException && $e->getCode() === '23502') {
                return response()->json(['error' => 'garmentType already exists'], 400);
            } else {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $garmentType = GarmentType::findOrFail($id);

            $garmentType->description = $request->input('description');
            $garmentType->status = $request->input('status');
            $garmentType->updated_at = now();
            $garmentType->save();

            return response()->json($garmentType, 200);
        } catch (Exception $e) {
            if ($e instanceof ModelNotFoundException) {
                return response()->json(['error' => 'GarmentType not found'], 404);
            } else {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
    public function destroy($id)
    {
        try {
            $garmentType = GarmentType::findOrFail($id);
            $garmentType->delete();

            return response()->json(['Delete'=> $id]); // HTTP status code: 204 No Content
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
