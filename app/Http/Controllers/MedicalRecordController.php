<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $medicalRecords = MedicalRecord::with('patient')
            ->where('doctor_name', $user->name)
            ->get();
        
        return view('medical_records.index', compact('medicalRecords'));
    }

    public function create()
    {
        // Récupérer le nom du médecin connecté
        $doctorName = Auth::user()->name;
        $patients = Patient::all();

        return view('medical_records.create', compact('patients', 'doctorName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_name' => 'required',
            'record' => 'required'
        ]);

        MedicalRecord::create($request->all());

        return redirect()->route('medical-records.index');
    }

    public function show(MedicalRecord $medicalRecord)
    {
        $this->authorize('view', $medicalRecord); // S'assurer que le médecin peut voir ce dossier
        return view('medical_records.show', compact('medicalRecord'));
    }

    public function edit(MedicalRecord $medicalRecord)
    {
        $this->authorize('update', $medicalRecord); // S'assurer que le médecin peut modifier ce dossier
        $patients = Patient::all();
        return view('medical_records.edit', compact('medicalRecord', 'patients'));
    }

    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_name' => 'required',
            'record' => 'required'
        ]);

        $this->authorize('update', $medicalRecord); // S'assurer que le médecin peut modifier ce dossier
        $medicalRecord->update($request->all());

        return redirect()->route('medical-records.index');
    }

    public function destroy(MedicalRecord $medicalRecord)
    {
        $this->authorize('delete', $medicalRecord); // S'assurer que le médecin peut supprimer ce dossier
        $medicalRecord->delete();
        return redirect()->route('medical-records.index');
    }
}
