<?php

namespace App\DataAccessors\Cache;

use App\DataAccessors\DoctorPatientDataAccessorInterface;
use App\Models\Doctor;
use App\Models\DoctorPatient;
use App\Models\Patient;

class DoctorPatientDataAccessor implements DoctorPatientDataAccessorInterface
{
    public function __construct(
        private DoctorPatientDataAccessorInterface $dataAccessor
    ) {
    }

    public function create(
        Doctor $doctor,
        Patient $patient
    ): DoctorPatient {
        return $this->dataAccessor->create($doctor, $patient);
    }
}
