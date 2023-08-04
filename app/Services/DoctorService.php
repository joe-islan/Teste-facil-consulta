<?php

namespace App\Services;

use App\DataAccessors\DoctorDataAccessorInterface;
use App\Models\City;
use App\Models\Doctor;
use Illuminate\Support\Collection;

class DoctorService
{
    public function __construct(
        private readonly DoctorDataAccessorInterface $doctorDataAccessor,
    ) {
    }

    public function store(
        string $name,
        string $specialty,
        int $cityId
    ): Doctor {
        return $this->doctorDataAccessor->create(
            $name,
            $specialty,
            $cityId
        );
    }

    public function getById(int $id): Doctor
    {
        return $this->doctorDataAccessor->getById($id);
    }

    public function getAll(): Collection
    {
        return $this->doctorDataAccessor->getAll();
    }

    public function getByCity(City $city): Collection
    {
        return $this->doctorDataAccessor->getByCity($city);
    }

    public function getPatients(Doctor $doctor): Collection
    {
        return $this->doctorDataAccessor->getPatientsByDoctor($doctor);
    }
}
