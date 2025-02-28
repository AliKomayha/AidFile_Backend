<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wife;

class WifeController extends Controller
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
        foreach($request->input('wives',[]) as $wife){
            Wife::create([
                'Beneficiary_ID' => $beneficiaryId,
                'full_name' => $wife['full_name'],
                'place_of_birth' => $wife['place_of_birth'],
                'date_of_birth' => $wife['date_of_birth'],
                'religious_commitment' => $wife['religious_commitment'],
                'doctrine' => $wife['doctrine'],
                'lineage' => $wife['lineage'],
                'academic_level' => $wife['academic_level'],
                'type_of_work' => $wife['type_of_work'],
                'monthly_income' => $wife['monthly_income'],
                'health_status' => $wife['health_status'],
                'guarantor' => $wife['guarantor'],
                'blood_type' => $wife['blood_type'],
                'property_type' => $wife['property_type'],
                'property_value' => $wife['property_value']
            ]);
        }
        return response()->json([
            'message' => 'Wives added successfully'
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
    public function update(Request $request, $beneficiaryId)
    {
        Wife::where('Beneficiary_ID', $beneficiaryId)->delete();

        foreach($request->input('wives',[]) as $wife){
            Wife::create([
                'Beneficiary_ID' => $beneficiaryId,
                'full_name' => $wife['full_name'],
                'place_of_birth' => $wife['place_of_birth'],
                'date_of_birth' => $wife['date_of_birth'],
                'religious_commitment' => $wife['religious_commitment'],
                'doctrine' => $wife['doctrine'],
                'lineage' => $wife['lineage'],
                'academic_level' => $wife['academic_level'],
                'type_of_work' => $wife['type_of_work'],
                'monthly_income' => $wife['monthly_income'],
                'health_status' => $wife['health_status'],
                'guarantor' => $wife['guarantor'],
                'blood_type' => $wife['blood_type'],
                'property_type' => $wife['property_type'],
                'property_value' => $wife['property_value']
            ]);
        }
        return response()->json([
            'message' => 'Wives updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
