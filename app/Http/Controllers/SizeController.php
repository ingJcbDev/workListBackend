<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    /**
         * Display a listing of the sizes.
         *
         * @return \Illuminate\Http\Response
         */
    public function index()
    {
        $sizes = Size::all();

        return response()->json($sizes, 200); // HTTP status code: 200 OK
    }


    public function show($id)
    {
        try {
            $size = Size::findOrFail($id);

            return response()->json($size, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Store a newly created size in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = new Size();
        $size->size = $request->input('size');

        $size->save();

        return response()->json($size, 201); // HTTP status code: 201 Created
    }

    /**
     * Update the specified size in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $size = Size::findOrFail($id);
        $size->size = $request->input('size');

        $size->save();

        return response()->json($size, 200); // HTTP status code: 200 OK
    }

    /**
     * Remove the specified size from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $size = Size::findOrFail($id);
        $size->delete();

        return response()->json(['Delete'=> $id], 204); // HTTP status code: 204 No Content
    }
}
