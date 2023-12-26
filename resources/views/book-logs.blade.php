@extends('base')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1 class="mb-0">Logs</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Timestamp</th>
                            <th>Log Entry</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logEntries as $logEntry)
                            <tr>
                                <td>{{ $logEntry->formattedCreatedAt }}</td>
                                <td>{{ $logEntry->log_entry }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
