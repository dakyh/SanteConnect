<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        $doctorName = Auth::user()->name;
        $patients = Patient::where('doctor_name', $doctorName)->get();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required'
        ]);

        $doctorName = Auth::user()->name;

        Patient::create(array_merge($request->all(), ['doctor_name' => $doctorName]));

        return redirect()->route('patients.index');
    }

    public function show(Patient $patient)
    {
        $this->authorize('view', $patient);
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $this->authorize('update', $patient);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required'
        ]);

        $this->authorize('update', $patient);

        $patient->update($request->all());

        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient)
    {
        $this->authorize('delete', $patient);

        $patient->delete();
        return redirect()->route('patients.index');
    }
}
