@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Patient</h1>
    <form method="POST" action="{{ route('patients.update', $patient->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $patient->first_name }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $patient->last_name }}">
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $patient->date_of_birth }}">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male" {{ $patient->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $patient->gender === 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
