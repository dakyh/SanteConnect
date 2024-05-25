@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Medical Record</h1>
    <form method="POST" action="{{ route('medical-records.store') }}">
        @csrf
        <div class="form-group">
            <label for="patient_id">Patient:</label>
            <select class="form-control" id="patient_id" name="patient_id">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->first_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_id">Doctor:</label>
            <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ auth()->user()->name }}" readonly>
            <input type="hidden" id="doctor_id" name="doctor_id" value="{{ auth()->user()->id }}">
        </div>
        <div class="form-group">
            <label for="record">Record:</label>
            <textarea class="form-control" id="record" name="record" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
