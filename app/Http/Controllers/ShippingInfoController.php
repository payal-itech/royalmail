<?php

namespace App\Http\Controllers;

use App\Models\ShippingInfo;
use App\Models\Order;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ShippingInfoController extends Controller
{
    public function index()
    {
        $orders = $this->getOrdersFromAPI();
        return view('shippinginfos.index', compact('orders'));
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
// dd($response);
// dd($ordersData);

return collect($ordersData['orders'] ?? [])->map(function ($orderData) {
    return [
        'order_id' => $orderData['orderIdentifier'] ?? null,
        'shippingInfo' => [
            'firstName' => $orderData['shippingInfo']['firstName'] ?? null,
            'lastName' => $orderData['shippingInfo']['lastName'] ?? null,
            'companyName' => $orderData['shippingInfo']['companyName'] ?? null,
            'addressLine1' => $orderData['shippingInfo']['addressLine1'] ?? null,
            'addressLine2' => $orderData['shippingInfo']['addressLine2'] ?? null,
            'addressLine3' => $orderData['shippingInfo']['addressLine3'] ?? null,
            'city' => $orderData['shippingInfo']['city'] ?? null,
            'county' => $orderData['shippingInfo']['county'] ?? null,
            'postcode' => $orderData['shippingInfo']['postcode'] ?? null,
            'countryCode' => $orderData['shippingInfo']['countryCode'] ?? null,
            'phoneNumber' => $orderData['shippingInfo']['phoneNumber'] ?? null,
            'emailAddress' => $orderData['shippingInfo']['emailAddress'] ?? null,

        ],
    ];
});
        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            $errorResponse = json_decode($e->getResponse()->getBody(), true);

            return collect();
        }
    }
}
