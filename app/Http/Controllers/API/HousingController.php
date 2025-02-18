<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Housing;

class HousingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $beneficiaryId)
    {
        $housing = Housing::create([
            'Beneficiary_ID' => $beneficiaryId,
            'city' => $request->input('housing.city'),
            'street' => $request->input('housing.street'),
            'building' => $request->input('housing.building'),
            'nature_of_housing' => $request->input('housing.nature_of_housing'),
        
        ]);

        return response()->json([
            'message' => 'Housing information added successfully',
            'housing' => $housing
        ], 201);
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
