<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllerHelper;
use App\Http\Controllers\Controller;
use App\Services\CityService;
use Illuminate\Http\JsonResponse;
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
}
