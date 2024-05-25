<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use Auditable;
    protected $guarded = ['_token'];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_name', 'name');
    }
}
