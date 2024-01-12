@extends('layouts.app')

@section('title', 'Delete Order')

@section('content')
    <h2>Delete Orders</h2>

    <form action="{{ route('orders.delete') }}" method="post">
        @csrf
        <table border="1" class="table bordered table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Reference</th>
                    <th>Order Info</th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders['deletedOrders'] as $order)
                <tr>
                    <td>{{ $order['orderIdentifier'] }}</td>
                    <td>{{ $order['orderReference'] }}</td>
                    <td>{{ $order['orderInfo'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <button type="submit">Delete Orders</button>
        </div>
    </form>

    <h2>Error Orders</h2>

    <form action="{{ route('orders.delete') }}" method="post">
        @csrf
        <table border="1" class="table bordered table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Reference</th>
                    <th>Code</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders['errors'] as $order)
                <tr>
                    <td>{{ $order['orderIdentifier'] }}</td>
                    <td>{{ $order['orderReference'] }}</td>
                    <td>{{ $order['code'] }}</td>
                    <td>{{ $order['message'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <button type="submit">Error Orders</button>
        </div>
    </form>

    @if (session('response'))
        <h3>Response</h3>
        <pre>{{ json_encode(session('response'), JSON_PRETTY_PRINT) }}</pre>
    @endif
@endsection
