@extends('layouts.app')

@section('title', 'Order Detail')

@section('content')
    <h2>Order Detail</h2>

    <table border='1' class="table Bordered Table table_striped">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>SKU</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Unit Value</th>
                <th>Line Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                @if (isset($order['orderLines']) && is_array($order['orderLines']))
                    @foreach ($order['orderLines'] as $ordline)
                        <tr>
                            <td>{{ $order['order_id'] ?? '' }}</td>
                            <td>{{ $ordline['SKU'] ?? '' }}</td>
                            <td>{{ $ordline['name'] ?? '' }}</td>
                            <td>{{ $ordline['quantity'] ?? '' }}</td>
                            <td>{{ $ordline['unitValue'] ?? '' }}</td>
                            <td>{{ $ordline['lineTotal'] ?? '' }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
