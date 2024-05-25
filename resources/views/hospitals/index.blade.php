@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Hospitals</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hospitals as $hospital)
                <tr>
                    <td>{{ $hospital->name }}</td>
                    <td>{{ $hospital->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
