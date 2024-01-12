<!-- resources/views/versions/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>API Version Details</h1>

        @if($apiVersion)
            <table class="table">
                <thead>
                    <tr>
                        <th>Commit</th>
                        <th>Build</th>
                        <th>Release</th>
                        <th>Release Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $apiVersion['commit'] }}</td>
                        <td>{{ $apiVersion['build'] }}</td>
                        <td>{{ $apiVersion['release'] }}</td>
                        <td>{{ $apiVersion['releaseDate'] }}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <p>No API version details available.</p>
        @endif
    </div>
@endsection
