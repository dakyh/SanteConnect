<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Auth\Access\HandlesAuthorization;

class PatientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the patient.
     */
    public function view(User $user, Patient $patient)
    {
        return $user->name === $patient->doctor_name;
    }

    /**
     * Determine whether the user can update the patient.
     */
    public function update(User $user, Patient $patient)
    {
        return $user->name === $patient->doctor_name;
    }

    /**
     * Determine whether the user can delete the patient.
     */
    public function delete(User $user, Patient $patient)
    {
        return $user->name === $patient->doctor_name;
    }
}
