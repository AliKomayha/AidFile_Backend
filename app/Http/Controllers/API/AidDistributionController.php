<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AidDistribution;
use App\Http\Requests\StoreAidDistributionRequest;

class AidDistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
