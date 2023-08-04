<?php

namespace App\DataAccessors\Cache;

use App\DataAccessors\DoctorDataAccessorInterface;
use App\Models\City;
use App\Models\Doctor;
use Illuminate\Support\Collection;

class DoctorDataAccessor implements DoctorDataAccessorInterface
{
    public function __construct(
        private DoctorDataAccessorInterface $dataAccessor
    ) {
    }

    public function create(
        string $name,
        string $specialty,
        int $cityId
    ): Doctor {
        return $this->dataAccessor->create($name, $specialty, $cityId);
    }

    public function getById(int $id): Doctor
    {
        return $this->dataAccessor->getById($id);
    }

    public function getAll(): Collection
    {
        return $this->dataAccessor->getAll();
    }

    public function getByCity(City $city): Collection
    {
        return $this->dataAccessor->getByCity($city);
    }

    public function getPatientsByDoctor(Doctor $doctor): Collection
    {
        return $this->dataAccessor->getPatientsByDoctor($doctor);
    }
}
