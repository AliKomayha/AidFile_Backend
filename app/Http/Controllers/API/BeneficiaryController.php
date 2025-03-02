<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBeneficiaryRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\WorkController;
use App\Http\Controllers\API\HousingController;
use App\Http\Controllers\API\WifeController;
use App\Http\Controllers\API\ChildController;
use App\Http\Controllers\API\PropertyController;


class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beneficiaries=Beneficiary::with(['work', 'housing', 'wives', 'children', 'properties','aidDistributions'])->get();
        return response()->json($beneficiaries);
    }

    public function aidProc(){
        $beneficiaries = Beneficiary::with(['work', 'housing', 'aidDistributions'])
        ->get()
        ->map(function ($beneficiary) {
            return [
                'id' => $beneficiary->id,
                'name' => $beneficiary->name,
                'father_name' => $beneficiary->father_name,
                'lastname' => $beneficiary->lastname,
                'phone_number' => $beneficiary->phone_number,
                'mothers_name' => $beneficiary->mothers_name,
                'social_status' => $beneficiary->social_status,
                'family_situation' => $beneficiary->family_situation,
                'family_status' => $beneficiary->family_status,
                'job_type' => $beneficiary->work?->job_type ?? "غير متوفر",
                'street' => $beneficiary->housing?->street ?? "غير متوفر",
                'total_aids' => $beneficiary->aidDistributions->count(), // ✅ Total aids received
                'last_aid_date' => $beneficiary->aidDistributions->max('date_given') ?? "لم يستلم", // ✅ Last received aid date
            ];
        });

    return response()->json($beneficiaries);
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBeneficiaryRequest $request)
    {
        DB::beginTransaction();
        try{
            
            $validatedData = $request->validated();
            $beneficiary = Beneficiary::create($validatedData['beneficiary']);

            if ($request->has('work')) {
                app(WorkController::class)->store($request, $beneficiary->id);
            }

            if ($request->has('housing')) {
                app(HousingController::class)->store($request, $beneficiary->id);
            }

            if ($request->has('wives')) {
                app(WifeController::class)->store($request, $beneficiary->id);
            }

            if ($request->has('children')) {
                app(ChildController::class)->store($request, $beneficiary->id);
            }

            if ($request->has('properties')) {
                app(PropertyController::class)->store($request, $beneficiary->id);
            }
            
            DB::commit();
            
            return response()->json([
                'message' => 'Beneficiary created successfully',
                'beneficiary' => $beneficiary
            ], 201);
            
        }catch(\Exception $e){
                DB::rollBack();
                return response()->json([
                    'error' => 'Failed to create beneficiary',
                    'message' => $e->getMessage()
                ], 500);
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $beneficiaries=Beneficiary::findOrFail($id);
        // return response()->json($beneficiaries);

        $beneficiaries=Beneficiary::with(['work','housing','wives','children','properties','aidDistributions.aid'])->findOrFail($id);
        return response()->json($beneficiaries);
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBeneficiaryRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $beneficiary = Beneficiary::findOrFail($id);
            $beneficiary->update($request->validated()['beneficiary']);

            // ✅ Update related records
            if ($request->has('work')) {
                app(WorkController::class)->update($request, $beneficiary->id);
            }

            if ($request->has('housing')) {
                app(HousingController::class)->update($request, $beneficiary->id);
            }

            if ($request->has('wives')) {
                app(WifeController::class)->update($request, $beneficiary->id);
            }

            if ($request->has('children')) {
                app(ChildController::class)->update($request, $beneficiary->id);
            }

            if ($request->has('properties')) {
                app(PropertyController::class)->update($request, $beneficiary->id);
            }

            DB::commit();

            return response()->json(['message' => 'Beneficiary updated successfully', 'data' => $beneficiary], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Failed to update beneficiary',
                'message' => $e->getMessage()
            ], 500);
        }
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
