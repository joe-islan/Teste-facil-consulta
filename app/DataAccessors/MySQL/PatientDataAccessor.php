<?php

namespace App\DataAccessors\MySQL;

use App\DataAccessors\PatientDataAccessorInterface;
use App\Models\Patient;

class PatientDataAccessor implements PatientDataAccessorInterface
{
    public function create(
        string $name,
        string $cpf,
        string $phone
    ): Patient {
        $patient = (new Patient())->fill([
            'name' => $name,
            'cpf' => $cpf,
            'phone' => $phone,
        ]);

        $patient->save();

        return $patient;
    }

    public function getById(int $id): Patient
    {
        return Patient::where('id', $id)->firstOrFail();
    }

    public function update(Patient $patient, array $data): Patient
    {
        if (isset($data['name'])) {
            $patient->name = $data['name'];
        }

        if (isset($data['cpf'])) {
            $patient->cpf = $data['cpf'];
        }

        if (isset($data['phone'])) {
            $patient->phone = $data['phone'];
        }

        $patient->save();

        return $patient->fresh();
    }
}
