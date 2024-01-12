@extends('layouts.app')

@section('title', ' orders status')
@section('content')
    <h2> orders status</h2>
    <form method="GET" action="{{ route('orders.search') }}">
        <label for="reprintFilter">Reprint Filter:</label>
        <select name="reprintFilter" id="reprintFilter">
            <option value="" {{ request('reprintFilter') == '' ? 'selected' : '' }}>All Orders</option>
            <option value="printed" {{ request('reprintFilter') == 'printed' ? 'selected' : '' }}>Printed Orders</option>
            <option value="not_printed" {{ request('reprintFilter') == 'not_printed' ? 'selected' : '' }}>Not Printed Orders</option>
        </select>

        <button type="submit">Search</button>
    </form>

    <table border="1" class="table Bordered Table table-striped">
        <thead>
            <th>PrintedOn</th>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                @if (request('reprintFilter') == 'printed' && empty($order['printedOn']))
                    @continue
              
                @endif
                <tr>
                    <td>{{ $order['printedOn'] }}</td>
                    <td>
                        <a href="{{ route('orders.reprint', ['orderId' => $order['orderIdentifier']]) }}">Reprint</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection