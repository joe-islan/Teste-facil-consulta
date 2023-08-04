<?php

namespace App\Services;

use App\DataAccessors\DoctorPatientDataAccessorInterface;
use App\Models\Doctor;
use App\Models\DoctorPatient;

class DoctorPatientService
{
    public function __construct(
        private readonly DoctorPatientDataAccessorInterface $doctorPatientDataAccessor,
        private readonly PatientService $patientService,
    ) {
    }

    public function store(
        Doctor $doctor,
        int $patientId
    ): DoctorPatient {
        try {
            $patient = $this->patientService->getById($patientId);
        } catch (\Throwable $th) {
            throw new \Exception('Paciente não encontrado');
        }

        return $this->doctorPatientDataAccessor->create(
            $doctor,
            $patient
        );
    }
}
