@extends('layouts.app')

@section('title', 'Retrieve details of specific orders')
@section('content')
    <h2>Retrieve details of specific orders</h2>
    <table border="1" class="table Bordered Table table-striped">
        <form method="GET" action="{{ route('orders.search') }}">
            <label for="accountBatchNumber">Account Batch Number:</label>
            <input type="text" name="accountBatchNumber" id="accountBatchNumber" value="{{ request('accountBatchNumber') }}">
            <button type="submit">Search</button>
        </form>
        <label for="reprintFilter">Reprint Filter:</label>
        <select name="reprintFilter" id="reprintFilter">
            <option value="" {{ request('reprintFilter') == '' ? 'selected' : '' }}>All Orders</option>
            <option value="printed" {{ request('reprintFilter') == 'printed' ? 'selected' : '' }}>Printed Orders</option>
            <option value="not_printed" {{ request('reprintFilter') == 'not_printed' ? 'selected' : '' }}>Not Printed Orders</option>
        </select>

        <button type="submit">Search</button>
    </form>
        <thead>
            <tr>
                <th>Order ID </th>
                <th>Order Reference</th>
                <th>Status</th>
                    {{-- <label for="Filter">Status</label> --}}
                    {{-- <select name="statusFilter" id="statusFilter">
                        <option value="" {{ request('statusFilter') == '' ? 'selected' : '' }}>All Orders</option>
                        <option value="new" {{ request('statusFilter') == 'new' ? 'selected' : '' }}>New </option>
                        <option value="postage_apply" {{ request('statusFilter') == 'postage_apply' ? 'selected' : '' }}>Postage Apply</option>
                        <option value="label_generated" {{ request('statusFilter') == 'label_generated' ? 'selected' : '' }}>Label Generated</option> --}} 
                        {{-- <option value="not_printed" {{ request('statusFilter') == 'not_printed' ? 'selected' : '' }}>Not Printed Orders</option>
                        <!-- Add other options as needed -->
                {{-- <button type="submit">Search</button> --}}
                    {{-- </select> --}}
                {{-- </th> --}}
                <th>Created On</th>
                <th>Printed On</th>
                <th>Postage AppliedOn</th>
                <th>Order Date</th>
                <th>Trading Name</th>
                <th>channel</th>
                <th>Marketplace TypeName</th>
                <th>Sub total</th>
                <th>Shipping CostCharged</th>
                <th>Order Discount</th>
                <th>Total</th>
                <th>Weight In Grams</th>
                <th>Package Size</th>
                <th>Account Batch Number</th>
                <th>Currency Code</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                @if (request('reprintFilter') == 'printed' && empty($order['printedOn']))
                    @continue
              
                @endif
                <tr>
                    <td>{{ $order['orderIdentifier'] }}</td>
                    <td>{{ $order['orderReference'] }}</td>
                    <td>{{ $order['orderStatus'] }}</td>
                    <td>{{ $order['createdOn'] }}</td>
                    <td>{{ $order['printedOn'] }}</td>
                    <td>{{ $order['postageAppliedOn'] }}</td>
                    <td>{{ $order['orderDate'] }}</td>
                    <td>{{ $order['tradingName'] }}</td>
                    <td>{{ $order['channel'] }}</td>
                    <td>{{ $order['marketplaceTypeName'] }}</td>
                    <td>{{ $order['subtotal'] }}</td>
                    <td>{{ $order['shippingCostCharged'] }}</td>
                    <td>{{ $order['orderDiscount'] }}</td>
                    <td>{{ $order['total'] }}</td>
                    <td>{{ $order['weightInGrams'] }}</td>
                    <td>{{ $order['packageSize'] }}</td>
                    <td>{{ $order['accountBatchNumber'] }}</td>
                    <td>{{ $order['currencyCode'] }}</td>
                    <td>
                        <a href="{{ route('orders.index', ['orderId' => $order['orderIdentifier']]) }}">print</a>
                    </td>
                    <th>
                        {{-- <a href="{{ route('orders.index', ['statusFilter' => request('statusFilter')]) }}">Apply Filter</a> --}}
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



