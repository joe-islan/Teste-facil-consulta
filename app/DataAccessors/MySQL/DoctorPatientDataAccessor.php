<?php

namespace App\DataAccessors\MySQL;

use App\DataAccessors\DoctorPatientDataAccessorInterface;
use App\Models\Doctor;
use App\Models\DoctorPatient;
use App\Models\Patient;

class DoctorPatientDataAccessor implements DoctorPatientDataAccessorInterface
{
    public function create(
        Doctor $doctor,
        Patient $patient
    ): DoctorPatient {
        $doctorPatient = (new DoctorPatient())->fill([
            'doctor_id' => $doctor->getId(),
            'patient_id' => $patient->getId(),
        ]);

        $doctorPatient->save();

        return $doctorPatient;
    }
}
