@extends('layouts.app')

@section('title', 'Shipping Infos')

@section('content')
    <h2>Billing Information</h2>
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
                    <td>{{ $order['billingInfo']['firstName'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['lastName'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['companyName'] ?? ' NULL' }}</td>
                    <td>{{ $order['billingInfo']['addressLine1'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['addressLine2'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['addressLine3'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['city'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['county'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['postcode'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['countryCode'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['phoneNumber'] ?? '' }}</td>
                    <td>{{ $order['billingInfo']['emailAddress'] ?? '' }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
