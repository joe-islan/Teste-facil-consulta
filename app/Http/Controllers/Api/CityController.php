<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllerHelper;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Services\CityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    public function __construct(
        private ControllerHelper $controllerHelper,
        private CityService $cityService,
    ) {
    }

    public function index(): JsonResponse
    {
        try {
            return $this->controllerHelper->successJsonResponse(
                Response::HTTP_OK,
                'Lista de cidades obtida com sucesso',
                $this->cityService->getAll()->toArray()
            );
        } catch (\Exception $e) {
            return $this->controllerHelper->errorJsonResponse(
                Response::HTTP_BAD_REQUEST,
                sprintf('Ocorreu um erro - %s.', $e->getMessage())
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
    }
}
