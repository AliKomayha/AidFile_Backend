<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BeneficiaryController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AidDistributionController;
use App\Http\Controllers\API\AidController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//beneficiaries
Route::get('/beneficiaries',[BeneficiaryController::class,'index'])->middleware('auth:sanctum');
Route::post('/beneficiaries',[BeneficiaryController::class,'store'])->middleware('auth:sanctum');
Route::get('/beneficiaries/{id}',[BeneficiaryController::class,'show'])->middleware('auth:sanctum');
Route::put('/beneficiaries/{id}',[BeneficiaryController::class,'update'])->middleware('auth:sanctum');
Route::delete('/beneficiaries/{id}',[BeneficiaryController::class,'destroy'])->middleware('auth:sanctum');


//auth
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

//users
Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::post('/users', [UserController::class, 'store'])->middleware('auth:sanctum');
Route::put('/users/{id}', [UserController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth:sanctum');

//aid distributions
Route::get('/aid-distributions', [AidDistributionController::class, 'index'])->middleware('auth:sanctum');
Route::post('/aid-distributions', [AidDistributionController::class, 'store'])->middleware('auth:sanctum');
Route::get('/aid-distributions/{id}', [AidDistributionController::class, 'show'])->middleware('auth:sanctum');
Route::put('/aid-distributions/{id}', [AidDistributionController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/aid-distributions/{id}', [AidDistributionController::class, 'destroy'])->middleware('auth:sanctum');

//aids
Route::get('/aids', [AidController::class, 'index'])->middleware('auth:sanctum');
Route::post('/aids', [AidController::class, 'store'])->middleware('auth:sanctum');
Route::put('/aids/{id}', [AidController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/aids/{id}', [AidController::class, 'destroy'])->middleware('auth:sanctum');

