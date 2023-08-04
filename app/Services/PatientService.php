<?php

namespace App\Services;

use App\DataAccessors\PatientDataAccessorInterface;
use App\Models\Patient;

class PatientService
{
    public function __construct(
        private readonly PatientDataAccessorInterface $patientDataAccessor,
    ) {
    }

    public function store(
        string $name,
        string $cpf,
        string $phone
    ): Patient {
        return $this->patientDataAccessor->create(
            $name,
            $cpf,
            $phone
        );
    }

    public function getById(int $id): Patient
    {
        return $this->patientDataAccessor->getById($id);
    }

    public function update(Patient $patient, array $data): Patient
    {
        return $this->patientDataAccessor->update($patient, $data);
    }
}
