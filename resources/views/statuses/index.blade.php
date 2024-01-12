@extends('layouts.app')

@section('title', 'Status List')

@section('content')
    <h2>Status List</h2>
    <table border="1" class="table Bordered Table table-striped">
        <thead>
            <tr>
                <th>Type   </th>
                <th>Title  </th>
                <th>Status </th>
                <th>TraceId</th>
                {{-- <th>       </th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ $status['type'] }}</td>
                    <td>{{ $status['title'] }}</td>
                    <td>{{ $status['status'] }}</td>
                    <td>{{ $status['traceId'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
