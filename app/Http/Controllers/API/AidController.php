<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aid;

class AidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aids=Aid::all();
        return response()->json($aids);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['type' => 'required|string']);

        $aid = Aid::create($request->all());

        return response()->json(['message' => 'Aid type added successfully', 'data' => $aid], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
