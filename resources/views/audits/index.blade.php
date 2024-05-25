@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Audit Logs</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>User</th>
                    <th>Action</th>
                    <th>Model</th>
                    <th>Changes</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($audits as $audit)
                    <tr>
                        <td>{{ $audit->user->name }}</td>
                        <td>{{ $audit->action }}</td>
                        <td>{{ $audit->auditable_type }}</td>
                        <td>
                            <div class="changes">
                                <div><strong>Old:</strong>
                                    @if (!empty($audit->old_values))
                                        @php
                                            $oldValues = json_decode($audit->old_values, true);
                                        @endphp
                                        @foreach ($oldValues as $key => $value)
                                            <div>{{ $key }} = {{ $value }}</div>
                                        @endforeach
                                    @else
                                        <div>No changes</div>
                                    @endif
                                </div>
                                <div><strong>New:</strong>
                                    @if (!empty($audit->new_values))
                                        @php
                                            $newValues = json_decode($audit->new_values, true);
                                        @endphp
                                        @foreach ($newValues as $key => $value)
                                            <div>{{ $key }} = {{ $value }}</div>
                                        @endforeach
                                    @else
                                        <div>No changes</div>
                                    @endif
                                </div>
                            </div>
                            
                            
                        </td>
                        <td>{{ $audit->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No audit logs available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
