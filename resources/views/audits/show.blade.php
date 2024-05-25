@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Audit Details</h1>
    <table class="table">
        <tr>
            <th>User</th>
            <td>{{ $audit->user->name }}</td>
        </tr>
        <tr>
            <th>Action</th>
            <td>{{ $audit->action }}</td>
        </tr>
        <tr>
            <th>Model</th>
            <td>{{ $audit->auditable_type }}</td>
        </tr>
        <tr>
            <th>Old Values</th>
            <td>{{ json_encode($audit->old_values) }}</td>
        </tr>
        <tr>
            <th>New Values</th>
            <td>{{ json_encode($audit->new_values) }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $audit->created_at }}</td>
        </tr>
    </table>
    <a href="{{ route('audits.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
