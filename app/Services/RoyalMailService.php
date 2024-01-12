<?php

namespace App\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RoyalMailService
{
    public function getOrders()
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

        $url = 'orders';

        try {
            $response = $client->request('GET', $url);
            $ordersData = json_decode($response->getBody(), true);

            // Uncomment the following line to debug the response
            // dd($ordersData);

            return collect($ordersData['orders'] ?? [])->map(function ($orderData) {
                return [
                    'orderIdentifier' => $orderData['orderIdentifier'] ?? '',
                    'orderReference' => $orderData['orderReference'] ?? '',
                    'createdOn' => $orderData['createdOn'] ?? '',
                    'orderDate' => $orderData['orderDate'] ?? '',
                    'printedOn' => $orderData['printedOn'] ?? '',
                    'trackingNumber' => $orderData['trackingNumber'] ?? '',
                ];
            });
        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            $errorResponse = json_decode($e->getResponse()->getBody(), true);
            \Log::error("API Request failed with status code $statusCode. Error response: " . json_encode($errorResponse));
            
            return collect();
        }
    }
}

