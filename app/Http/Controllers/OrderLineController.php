<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use App\Models\Order;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class OrderLineController extends Controller
{
    public function index()
    {
        $orders = $this->getOrdersFromAPI();
        return view('orderlines.index', compact('orders'));
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
                    'orderLines' => collect($orderData['orderLines'] ?? [])->map(function ($orderLineData) {
                        return [
                            'SKU' => $orderLineData['SKU'] ?? null,
                            'name' => $orderLineData['name'] ?? null,
                            'quantity' => $orderLineData['quantity'] ?? null,
                            'unitValue' => $orderLineData['unitValue'] ?? null,
                            'lineTotal' => $orderLineData['lineTotal'] ?? null,
                        ];
                    })->toArray(),
                ];
            });
        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            $errorResponse = json_decode($e->getResponse()->getBody(), true);

            return collect();
        }
    }
}
