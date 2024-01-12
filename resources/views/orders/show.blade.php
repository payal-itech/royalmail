@extends('layouts.app')

@section('title')

@section('content')
    <h1>Order Details</h1>
    <p>Order Identifier: {{ $orderDetails['orderIdentifier'] }}</p>
    <p>Created On: {{ $orderDetails['createdOn'] }}</p>
    <p>Order Date: {{ $orderDetails['orderDate'] }}</p>
    <p>Printed On: {{ $orderDetails['printedOn'] }}</p>
    <p>Tracking Number: {{ $orderDetails['trackingNumber'] }}</p>
@endsection