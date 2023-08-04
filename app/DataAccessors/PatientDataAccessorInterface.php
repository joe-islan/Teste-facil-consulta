<?php

namespace App\DataAccessors;

use App\Models\Patient;

interface PatientDataAccessorInterface extends DataAccessorInterface
{
    public function create(
        string $name,
        string $cpf,
        string $phone
    ): Patient;

    public function getById(int $id): Patient;

    public function update(Patient $patient, array $data): Patient;
}
