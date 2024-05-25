@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Medical Record</h1>
    <form method="POST" action="{{ route('medical_records.update', $medicalRecord->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient:</label>
            <select class="form-control" id="patient_id" name="patient_id">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $medicalRecord->patient_id == $patient->id ? 'selected' : '' }}>
                        {{ $patient->full_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $medicalRecord->date }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $medicalRecord->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
