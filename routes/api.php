<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\MasterFlavourController;
use App\Http\Controllers\MasterWeightController;
use App\Http\Controllers\MasterTimeSlotController;
use App\Http\Controllers\MasterAddressTypeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
    Route::apiResource('/users', UserController::class);

    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    
    ], function ($router) {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
        
        Route::apiResource('/categories', MasterCategoryController::class);
        Route::apiResource('/flavours', MasterFlavourController::class);
        Route::apiResource('/weights', MasterWeightController::class);
        Route::apiResource('/time_slots', MasterTimeSlotController::class);
        Route::apiResource('/address_types', MasterAddressTypeController::class);
        // Route::get('/category', [MasterCategoryController::class, 'index']);
        // Route::get('/category', function () {
        //     return MasterCategoriesResource::collection(MasterCategory::all());
        // });
    });