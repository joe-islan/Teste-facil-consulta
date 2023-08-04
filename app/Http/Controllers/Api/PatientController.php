<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllerHelper;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Services\PatientService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PatientController extends Controller
{
    public function __construct(
        private ControllerHelper $controllerHelper,
        private PatientService $patientService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StorePatientRequest $request): JsonResponse
    {
        try {
            return $this->controllerHelper->successJsonResponse(
                Response::HTTP_CREATED,
                'Paciente criado com sucesso!',
                $this->patientService->store(
                    $request['nome'],
                    $request['cpf'],
                    $request['celular']
                )
            );
        } catch (\Exception $e) {
            return $this->controllerHelper->errorJsonResponse(
                Response::HTTP_BAD_REQUEST,
                sprintf('Ocorreu um erro - %s.', $e->getMessage())
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\UpdatePatientRequest $request, Patient $patient): JsonResponse
    {
        try {
            $updatedPatient = $this->patientService->update(
                $patient,
                [
                    'name' => $request->nome,
                    'cpf' => $request->cpf,
                    'phone' => $request->celular,
                ]
            );

            return $this->controllerHelper->successJsonResponse(
                Response::HTTP_OK,
                'Paciente atualizado com sucesso!',
                $updatedPatient
            );
        } catch (\Exception $e) {
            return $this->controllerHelper->errorJsonResponse(
                Response::HTTP_BAD_REQUEST,
                sprintf('Ocorreu um erro - %s.', $e->getMessage())
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
    }
}
