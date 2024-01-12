@extends('layouts.app')

@section('title', 'Shipping Infos')

@section('content')
    <h2>Shipping Information</h2>
    <table border='1' class="table Bordered Table table_striped">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company Name</th>
                <th>Address Line1</th>
                <th>Address Line2</th>
                <th>Address Line3</th>
                <th>City</th>
                <th>County</th>
                <th>Post Code</th>
                <th>Country Code</th>
                <th>Phone Number</th>
                <th>Email Address</th>

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order['order_id'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['firstName'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['lastName'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['companyName'] ?? ' NULL' }}</td>
                    <td>{{ $order['shippingInfo']['addressLine1'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['addressLine2'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['addressLine3'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['city'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['county'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['postcode'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['countryCode'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['phoneNumber'] ?? '' }}</td>
                    <td>{{ $order['shippingInfo']['emailAddress'] ?? '' }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
