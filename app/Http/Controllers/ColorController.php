<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ColorController extends Controller
{
    public function index()
    {
        try {
            $colors = Color::all();

            return response()->json($colors, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $color = Color::findOrFail($id);

            return response()->json($color, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $color = new Color();
            $color->description = $request->input('description');
            $color->status = $request->input('status');
            $color->save();

            return response()->json($color, 201);
        } catch (Exception $e) {
            if ($e instanceof QueryException && $e->getCode() === '23502') {
                return response()->json(['error' => 'Color already exists'], 400);
            } else {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $color = Color::findOrFail($id);

            $color->description = $request->input('description');
            $color->status = $request->input('status');
            $color->updated_at = now();
            $color->save();

            return response()->json($color, 200);
        } catch (Exception $e) {
            if ($e instanceof ModelNotFoundException) {
                return response()->json(['error' => 'Color not found'], 404);
            } else {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    }

    public function destroy($id)
    {
        try {
            $color = Color::findOrFail($id);
            $color->delete();

            return response()->json(['Delete'=> $id]); // HTTP status code: 204 No Content
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
