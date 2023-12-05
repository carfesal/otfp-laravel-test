<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryRequest;
use App\Services\SalaryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * @param SalaryRequest $request
     * @param SalaryService $service
     * @return JsonResponse
     */
    public function salaryInformation(SalaryRequest $request, SalaryService $service): JsonResponse
    {

        $request->validated();
        $response = $service->handle($request->all());
        return response()->json($response);
    }
}
