<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use Auditable;
    protected $fillable = ['patient_id', 'doctor_name', 'record'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
