<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\ShippingDetail;
use App\Models\Order;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ShippingDetailController extends Controller
{
    public function index()
    {
        $orders = $this->getOrdersFromAPI();
        return view('shippingdetails.index', compact('orders'));
    }

    private function getOrdersFromAPI()
    {
        $apiKey = config('app.ROYALMAIL_API_KEY');
        $secretKey = config('app.ROYALMAIL_SECRET_KEY');
        $rtoken = config('app.ROYALMAIL_TOKEN');

        $client = new Client([
            'base_uri' => 'https://api.parcel.royalmail.com/api/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Api-Key' => $apiKey,
                'Api-Secret' => $secretKey,
                'Authorization' => "Bearer " . $rtoken,
            ],
        ]);

        $url = 'Orders/full';
        try {
            $response = $client->request('GET', $url);
            $ordersData = json_decode($response->getBody(), true);

            return collect($ordersData['orders'] ?? [])->map(function ($orderData) {
                return [
                        'order_id' => $orderData['orderIdentifier'] ?? null,
                        'shippingCost' => $orderData['shippingDetails']['shippingCost'] ?? null,
                        'trackingNumber' => $orderData['shippingDetails']['trackingNumber'] ?? null,
                        'serviceCode' => $orderData['shippingDetails']['serviceCode'] ?? null,
                        'receiveEmailNotification' => $orderData['shippingDetails']['receiveEmailNotification'] ?? null,
                        'receiveSmsNotification' => $orderData['shippingDetails']['receiveSmsNotification'] ?? null,
                        'requestSignatureUponDelivery' => $orderData['shippingDetails']['requestSignatureUponDelivery'] ?? null,
                        'isLocalCollect' => $orderData['shippingDetails']['isLocalCollect'] ?? null,
                   
                ];
            });
        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            $errorResponse = json_decode($e->getResponse()->getBody(), true);

            // Handle the error response or log the error
            return collect();
        }
    }
    public function search(Request $request)
    {
        $serviceCode = $request->input('serviceCode');
        $orders = $this->getOrdersFromAPI();
        $filteredServiceCode = $orders->where('serviceCode', $serviceCode);
    
        return view('shippingdetails.index', ['orders' => $filteredServiceCode]);
    }
    
}
