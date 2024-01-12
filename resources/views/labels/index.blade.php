@extends('layouts.app')
@section('title', 'Label List')
@section('content')
    <h2>Labels List</h2>
    <table border="1" class="table Bordered Table table-striped">
        <thead>
            <tr>
                <th>AccountOrderNumber   </th>
                <th>ChannelOrderReference  </th>
                <th>Code </th>
                <th>Message</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($labels as $label)
                <tr>
                    <td>{{ $label['accountOrderNumber'] }}</td>
                    <td>{{ $label['channelOrderReference'] }}</td>
                    <td>{{ $label['code'] }}</td>
                    <td>{{ $label['message'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
