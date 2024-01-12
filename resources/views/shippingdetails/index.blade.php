@extends('layouts.app')

@section('title', 'Shipping Details')

@section('content')
    <h2>Shipping Detail</h2>
    {{-- echo "<pre>";print_r($orders); echo "</pre>"; --}}
    <table border='1' class="table Bordered Table table_striped">
        <form method="GET" action="{{ route('shippingdetails.search') }}">
            <label for="serviceCode">Service Code:</label>
            <input type="text" name="serviceCode" id="serviceCode" value="{{ request('serviceCode') }}">
            <button type="submit">Search</button>
        </form>
        <thead>

            <tr>
                <th>Order Id</th>
                <th>Shipping Cost</th>
                <th>Tracking Number</th>
                <th>Service Code</th>
                <th>Receive Email Notification</th>
                <th>Receive Sms Notification</th>
                <th>Request Signature Upon Delivery</th>
                <th>Is Local Collect</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order['order_id'] ?? '' }}</td>
                    <td>{{ $order['shippingCost'] ?? '' }}</td>
                    <td>{{ $order['trackingNumber'] ?? '' }}</td>
                    <td>{{ $order['serviceCode'] ?? '' }}</td>
                    <td>{{ $order['receiveEmailNotification'] ? 'Yes' : 'No' }}</td>
                    <td>{{ $order['receiveSmsNotification'] ? 'Yes' : 'No' }}</td>
                    <td>{{ $order['requestSignatureUponDelivery'] ? 'Yes' : 'No' }}</td>
                    <td>{{ $order['isLocalCollect'] ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
