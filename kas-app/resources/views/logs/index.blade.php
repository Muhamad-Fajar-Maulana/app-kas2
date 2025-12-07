@extends('templates/layout')

@section('content')
<h3>Logs Aktivitas</h3>

<table class="table">
    <thead><tr><th>ID</th><th>User</th><th>Action</th><th>Model</th><th>Model ID</th><th>Waktu</th></tr></thead>
    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{ $loop->iteration + ($logs->currentPage()-1)*$logs->perPage() }}</td>
            <td>{{ $log->user?->name ?? 'System' }}</td>
            <td>{{ $log->action }}</td>
            <td>{{ $log->model }}</td>
            <td>{{ $log->model_id }}</td>
            <td>{{ $log->created_at->format('Y-m-d H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $logs->links() }}
@endsection
