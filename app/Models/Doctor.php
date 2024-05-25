<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Models\MedicalRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


    class Doctor extends Model
    {
        use Auditable;
        protected $fillable = ['name', 'specialization'];

        protected $guarded = ['_token'];


        public function medicalRecords()
        {
            return $this->hasMany(MedicalRecord::class);
        }
        
    }
    

