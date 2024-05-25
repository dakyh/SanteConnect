<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MedicalRecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalRecordPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the medical record.
     */
    public function view(User $user, MedicalRecord $medicalRecord)
    {
        return $user->name === $medicalRecord->doctor_name;
    }

    /**
     * Determine whether the user can update the medical record.
     */
    public function update(User $user, MedicalRecord $medicalRecord)
    {
        return $user->name === $medicalRecord->doctor_name;
    }

    /**
     * Determine whether the user can delete the medical record.
     */
    public function delete(User $user, MedicalRecord $medicalRecord)
    {
        return $user->name === $medicalRecord->doctor_name;
    }
}
