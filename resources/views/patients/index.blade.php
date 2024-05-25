@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Patients</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->last_name }}</td>
                    <td>{{ $patient->first_name }}</td>
                    <td>{{ $patient->date_of_birth }}</td>
                    <td>{{ $patient->gender }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
