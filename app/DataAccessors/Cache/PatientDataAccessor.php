<?php

namespace App\DataAccessors\Cache;

use App\DataAccessors\PatientDataAccessorInterface;
use App\Models\Patient;

class PatientDataAccessor implements PatientDataAccessorInterface
{
    public function __construct(
        private PatientDataAccessorInterface $dataAccessor
    ) {
    }

    public function create(
        string $name,
        string $cpf,
        string $phone
    ): Patient {
        return $this->dataAccessor->create($name, $cpf, $phone);
    }

    public function getById(int $id): Patient
    {
        return $this->dataAccessor->getById($id);
    }

    public function update(Patient $patient, array $data): Patient
    {
        return $this->dataAccessor->update($patient, $data);
    }
}
