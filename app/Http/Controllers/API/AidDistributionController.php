<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AidDistribution;
use App\Http\Requests\StoreAidDistributionRequest;
use App\Http\Requests\UpdateAidDistributionRequest;

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
    public function store(StoreAidDistributionRequest $request)
    {
        $aidDistribution = AidDistribution::create($request->validated());

        return response()->json(['message' => 'Aid distribution recorded successfully', 'data' => $aidDistribution], 201);
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
