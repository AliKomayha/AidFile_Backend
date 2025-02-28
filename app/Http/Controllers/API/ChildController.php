<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;

class ChildController extends Controller
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
        foreach($request->input('children', []) as $child){
            Child::create([
                'Beneficiary_ID' => $beneficiaryId,
                'name' => $child['name'],
                'place_of_birth' => $child['place_of_birth'],
                'date_of_birth' => $child['date_of_birth'],
                'religious_commitment' => $child['religious_commitment'],
                'sex' => $child['sex'],
                'resident_in_house' => $child['resident_in_house'],
                'academic_level' => $child['academic_level'],
                'continues_studying' => $child['continues_studying'],
                'yearly_installment' => $child['yearly_installment'],
                'type_of_work' => $child['type_of_work'],
                'monthly_income' => $child['monthly_income'],
                'monthly_contribution' => $child['monthly_contribution'],
                'health_status' => $child['health_status'],
                'guarantor' => $child['guarantor'],
                'blood_type' => $child['blood_type']              

            ]);
            }
            return response()->json([
                'message' => 'Children added successfully'
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
        Child::where('Beneficiary_ID', $beneficiaryId)->delete();

        foreach($request->input('children', []) as $child){
            Child::create([
                'Beneficiary_ID' => $beneficiaryId,
                'name' => $child['name'],
                'place_of_birth' => $child['place_of_birth'],
                'date_of_birth' => $child['date_of_birth'],
                'religious_commitment' => $child['religious_commitment'],
                'sex' => $child['sex'],
                'resident_in_house' => $child['resident_in_house'],
                'academic_level' => $child['academic_level'],
                'continues_studying' => $child['continues_studying'],
                'yearly_installment' => $child['yearly_installment'],
                'type_of_work' => $child['type_of_work'],
                'monthly_income' => $child['monthly_income'],
                'monthly_contribution' => $child['monthly_contribution'],
                'health_status' => $child['health_status'],
                'guarantor' => $child['guarantor'],
                'blood_type' => $child['blood_type']
            ]);      

            }
            return response()->json([
                'message' => 'Children updated successfully'
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
