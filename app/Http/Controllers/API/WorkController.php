<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
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
        // \Log::info("Storing work details for Beneficiary ID: " . $beneficiaryId);
        // \Log::info("Received Data: " . json_encode($request->all()));

        $work = Work::create([
            'Beneficiary_ID' => $beneficiaryId,
            'job_type' => $request->input('work.job_type'),
            'contract_type' => $request->input('work.contract_type'),
            'monthly_income' => $request->input('work.monthly_income'),
        ]);

        return response()->json([
            'message' => 'Work information added successfully',
            'work' => $work
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
        $work= Work::where('Beneficiary_ID', $beneficiaryId)->first();

        if($work){
            $work->update([
                'job_type' => $request->input('work.job_type'),
                'contract_type' => $request->input('work.contract_type'),
                'monthly_income' => $request->input('work.monthly_income'),
            ]);
        }
        else{
            Work::create([
                'Beneficiary_ID' => $beneficiaryId,
                'job_type' => $request->input('work.job_type'),
                'contract_type' => $request->input('work.contract_type'),
                'monthly_income' => $request->input('work.monthly_income'),
            ]);
        }
        return response()->json([
            'message' => 'Work information updated successfully'

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
