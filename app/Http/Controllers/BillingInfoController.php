<?php

namespace App\Http\Controllers;

use App\Models\ShippingInfo;
use App\Models\Order;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class BillingInfoController extends Controller
{
    public function index()
    {
        $orders = $this->getOrdersFromAPI();
        return view('billinginfos.index', compact('orders'));
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
        'billingInfo' => [
            'firstName' => $orderData['billingInfo']['firstName'] ?? null,
            'lastName' => $orderData['billingInfo']['lastName'] ?? null,
            'companyName' => $orderData['billingInfo']['companyName'] ?? null,
            'addressLine1' => $orderData['billingInfo']['addressLine1'] ?? null,
            'addressLine2' => $orderData['billingInfo']['addressLine2'] ?? null,
            'addressLine3' => $orderData['billingInfo']['addressLine3'] ?? null,
            'city' => $orderData['billingInfo']['city'] ?? null,
            'county' => $orderData['billingInfo']['county'] ?? null,
            'postcode' => $orderData['billingInfo']['postcode'] ?? null,
            'countryCode' => $orderData['billingInfo']['countryCode'] ?? null,
            'phoneNumber' => $orderData['billingInfo']['phoneNumber'] ?? null,
            'emailAddress' => $orderData['billingInfo']['emailAddress'] ?? null,

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
