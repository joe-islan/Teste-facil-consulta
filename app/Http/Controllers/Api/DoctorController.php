<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ControllerHelper;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Doctor;
use App\Services\DoctorPatientService;
use App\Services\DoctorService;
use App\Services\PatientService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DoctorController extends Controller
{
    public function __construct(
        private ControllerHelper $controllerHelper,
        private DoctorService $doctorService,
        private DoctorPatientService $doctorPatientService,
        private PatientService $patientService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            return $this->controllerHelper->successJsonResponse(
                Response::HTTP_OK,
                'Lista de Médicos obtida com sucesso',
                $this->doctorService->getAll()->toArray()
            );
        } catch (\Exception $e) {
            return $this->controllerHelper->errorJsonResponse(
                Response::HTTP_BAD_REQUEST,
                sprintf('Ocorreu um erro - %s.', $e->getMessage())
            );
        }
    }

    public function showByCity(City $city): JsonResponse
    {
        try {
            return $this->controllerHelper->successJsonResponse(
                Response::HTTP_OK,
                'Lista de médicos por cidade obtida com sucesso',
                $this->doctorService->getByCity($city)->toArray()
            );
        } catch (\Exception $e) {
            return $this->controllerHelper->errorJsonResponse(
                Response::HTTP_BAD_REQUEST,
                sprintf('Ocorreu um erro - %s.', $e->getMessage())
            );
        }
    }

    public function attachPatient(Doctor $doctor, \App\Http\Requests\AttachPatientRequest $request): JsonResponse
    {
        try {
            $this->doctorPatientService->store(
                $doctor,
                $request['paciente_id']
            );

            return $this->controllerHelper->successJsonResponse(
                Response::HTTP_OK,
                'Paciente vinculado com sucesso!',
                [
                    'doctor' => $this->doctorService->getById($doctor->getId()),
                    'patient' => $this->patientService->getById($request['paciente_id']),
                ]
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
    public function store(\App\Http\Requests\StoreDoctorRequest $request): JsonResponse
    {
        try {
            return $this->controllerHelper->successJsonResponse(
                Response::HTTP_CREATED,
                'Médico criado com sucesso!',
                $this->doctorService->store(
                    $request['nome'],
                    $request['especialidade'],
                    $request['cidade_id']
                )
            );
        } catch (\Exception $e) {
            return $this->controllerHelper->errorJsonResponse(
                Response::HTTP_BAD_REQUEST,
                sprintf('Ocorreu um erro - %s.', $e->getMessage())
            );
        }
    }

    public function getPatients(Doctor $doctor): JsonResponse
    {
        try {
            $patients = $this->doctorService->getPatients($doctor);

            return $this->controllerHelper->successJsonResponse(
                Response::HTTP_OK,
                'Lista de pacientes obtida com sucesso',
                $patients
            );
        } catch (\Exception $e) {
            return $this->controllerHelper->errorJsonResponse(
                Response::HTTP_BAD_REQUEST,
                sprintf('Ocorreu um erro - %s.', $e->getMessage())
            );
        }
    }
}
