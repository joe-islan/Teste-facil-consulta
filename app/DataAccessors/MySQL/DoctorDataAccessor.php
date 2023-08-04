<?php

namespace App\DataAccessors\MySQL;

use App\DataAccessors\DoctorDataAccessorInterface;
use App\Models\City;
use App\Models\Doctor;
use Illuminate\Support\Collection;

class DoctorDataAccessor implements DoctorDataAccessorInterface
{
    public function create(
        string $name,
        string $specialty,
        int $cityId
    ): Doctor {
        $doctor = (new Doctor())->fill([
            'name' => $name,
            'specialty' => $specialty,
            'city_id' => $cityId,
        ]);

        $doctor->save();

        return $doctor;
    }

    public function getById(int $id): Doctor
    {
        return Doctor::where('id', $id)->firstOrFail();
    }

    public function getAll(): Collection
    {
        return Doctor::all();
    }

    public function getByCity(City $city): Collection
    {
        return Doctor::where('city_id', $city->getId())->get();
    }

    public function getPatientsByDoctor(Doctor $doctor): Collection
    {
        return $doctor->doctorPatients->map->patient;
    }
}
