@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Medical Records</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Record Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicalRecords as $record)
                <tr>
                    <td>{{ $record->patient->first_name }}</td>
                    <td>{{ $record->doctor_name }}</td>
                    <td>{{ $record->record }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
