<?php

namespace App\DataAccessors;

use App\Models\Doctor;
use App\Models\DoctorPatient;
use App\Models\Patient;

interface DoctorPatientDataAccessorInterface extends DataAccessorInterface
{
    public function exists(Patient $patient, Doctor $doctor): bool;

    public function create(
        Doctor $doctor,
        Patient $patient
    ): DoctorPatient;
}
