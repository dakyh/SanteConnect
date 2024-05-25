@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Doctors</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                  
                    <td>{{ $doctor->specialization }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
