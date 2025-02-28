<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AidDistribution;

use App\Http\Requests\UpdateAidDistributionRequest;
use Illuminate\Support\Facades\Validator; 

class AidDistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aidDistributions= AidDistribution::all();
        return response()->json($aidDistributions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        $aidDistributions = [];

        // Define validation rules
        $rules = [
            '*.Aid_ID' => ['required', 'exists:aids,id'],
            '*.Beneficiary_ID' => ['required', 'exists:beneficiaries,id'],
            '*.date_given' => ['required', 'date'],
            '*.unit_value' => ['required', 'numeric'],
            '*.amount' => ['required', 'numeric', 'min:0'],
        ];

        // Check if the request is a JSON array
        if ($request->isJson() && is_array($request->all())) {
            $validator = Validator::make($request->all(), $rules);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation Failed',
                    'messages' => $validator->errors()
                ], 422);
            }

            foreach ($request->all() as $distributionData) {
                $aidDistributions[] = AidDistribution::create($distributionData);
            }
        } else {
            // Handle single request
            $singleRules = [
                'Aid_ID' => ['required', 'exists:aids,id'],
                'Beneficiary_ID' => ['required', 'exists:beneficiaries,id'],
                'date_given' => ['required', 'date'],
                'unit_value' => ['required', 'numeric'],
                'amount' => ['required', 'numeric', 'min:0'],
            ];

            $validator = Validator::make($request->all(), $singleRules);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation Failed',
                    'messages' => $validator->errors()
                ], 422);
            }

            $aidDistributions[] = AidDistribution::create($validator->validated());
        }

        return response()->json(['message' => 'Aid distribution recorded successfully', 'data' => $aidDistributions], 201);
    }
       

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aidDistribution = AidDistribution::findOrFail($id);
        
        return response()->json($aidDistribution);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAidDistributionRequest $request, string $id)
    {
        $aidDistribution = AidDistribution::findOrFail($id);
        $aidDistribution->update($request->validated());

        return response()->json(['message' => 'Aid distribution updated successfully', 'data' => $aidDistribution], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aidDistribution = AidDistribution::findOrFail($id);
        $aidDistribution->delete();

        return response()->json(['message' => 'Aid distribution deleted successfully']);
    }
}
