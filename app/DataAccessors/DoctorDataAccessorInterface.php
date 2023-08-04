<?php

namespace App\DataAccessors;

use App\Models\City;
use App\Models\Doctor;
use Illuminate\Support\Collection;

interface DoctorDataAccessorInterface extends DataAccessorInterface
{
    public function create(
        string $name,
        string $specialty,
        int $cityId
    ): Doctor;

    public function getById(int $id): Doctor;

    public function getAll(): Collection;

    public function getByCity(City $city): Collection;

    public function getPatientsByDoctor(Doctor $doctor): Collection;
}
