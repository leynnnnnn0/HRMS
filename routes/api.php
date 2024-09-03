<?php

use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::controller(EmployeeController::class)->group(function () {
        Route::post('/personal-information/store', 'validatePersonalInformation');
        Route::post('/professional-information/store', 'validateProfessionalInformation');
        Route::post('/account-access/store', 'validateAccountAccess');
    });

});
