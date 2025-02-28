<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
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
        foreach($request->input('properties') as $property){
            Property::create([
                'Beneficiary_ID' => $beneficiaryId,
                'property_type' => $property['property_type'],
                'property_value' => $property['property_value'],
            ]);
        }
        return response()->json([
            'message' => 'Properties added successfully'

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
    public function update(Request $request,  $beneficiaryId)
    {
        Property::where('Beneficiary_ID', $beneficiaryId)->delete();
        
        foreach($request->input('properties',[]) as $property){
            Property::create([
                'Beneficiary_ID' => $beneficiaryId,
                'property_type' => $property['property_type'],
                'property_value' => $property['property_value'],
            ]);
        }
        return response()->json([
            'message' => 'Properties updated successfully'

        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
