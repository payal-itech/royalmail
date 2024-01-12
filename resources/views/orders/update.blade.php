@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Order Update Response</h1>

        @if(isset($updatedOrders) && !empty($updatedOrders))
            <h2>Updated Orders</h2>
            <ul>
                @foreach($updatedOrders as $updatedOrder)
                    <li>
                        Order ID: {{ $updatedOrder['orderIdentifier'] }},
                        Order Reference: {{ $updatedOrder['orderReference'] }},
                        Status: {{ $updatedOrder['status'] }}
                    </li>
                @endforeach
            </ul>
        @endif
        @if(isset($errors) && !empty($errors))
            <h2>Errors</h2>
            <ul>
                @foreach($errors as $error)
                    <li>
                        Order ID: {{ $error['orderIdentifier'] }},
                        Order Reference: {{ $error['orderReference'] }},
                        Status: {{ $error['status'] }},
                        Code: {{ $error['code'] }},
                        Message: {{ $error['message'] }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
