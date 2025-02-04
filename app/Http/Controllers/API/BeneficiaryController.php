<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBeneficiaryRequest;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beneficiaries=Beneficiary::all();
        return response()->json($beneficiaries);
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBeneficiaryRequest $request)
    {
        $beneficiary= Beneficiary::create($request->validated());
        
        // edit the message in arabic
        return response()->json(['message'=>'Beneficiary added successfully','data'=>$beneficiary],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $beneficiaries=Beneficiary::findOrFail($id);
        return response()->json($beneficiaries);
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBeneficiaryRequest $request, string $id)
    {
        $beneficiary = Beneficiary::findOrFail($id);
        $beneficiary->update($request->validated());

        return response()->json(['message' => 'Beneficiary updated successfully', 'data' => $beneficiary], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beneficiary = Beneficiary::findOrFail($id);
        $beneficiary->delete();

        return response()->json(['message' => 'Beneficiary deleted successfully'], 200);
    }
}
