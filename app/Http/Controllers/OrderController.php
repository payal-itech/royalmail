<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        $orders = $this->getOrdersFromAPI();   
        return view('orders.index', compact('orders'));
    }
    private function getOrdersFromAPI()
    {
        $apiKey = config('app.ROYALMAIL_API_KEY');
        $secretKey = config('app.ROYALMAIL_SECRET_KEY');
        // dd($secretKey);
        $rtoken = config('app.ROYALMAIL_TOKEN');
        // dd($rtoken);
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
// dd($ordersData);
    return collect($ordersData['orders'] ?? [])->map(function ($orderData) {
        return [
            'orderIdentifier' => $orderData['orderIdentifier'] ?? null,
            'orderReference' => $orderData['orderReference'] ?? null,
            'orderStatus' => $orderData['orderStatus'] ?? null,
            'createdOn' => $orderData['createdOn'] ?? null,
            'printedOn' => $orderData['printedOn'] ?? null,
            'postageAppliedOn' => $orderData['postageAppliedOn'] ?? null,
            'orderDate' => $orderData['orderDate'] ?? null,
            'tradingName' => $orderData['tradingName'] ?? null,
            'channel' => $orderData['channel'] ?? null,
            'marketplaceTypeName' => $orderData['marketplaceTypeName'] ?? null,
            'subtotal' => $orderData['subtotal'] ?? null,
            'shippingCostCharged' => $orderData['shippingCostCharged'] ?? null,
            'orderDiscount' => $orderData['orderDiscount'] ?? null,
            'total' => $orderData['total'] ?? null,
            'weightInGrams' => $orderData['weightInGrams'] ?? null,
            'packageSize' => $orderData['packageSize'] ?? null,
            'accountBatchNumber' => $orderData['accountBatchNumber'] ?? null,
            'currencyCode' => $orderData['currencyCode'] ?? null,
            'trackingNumber' => $orderData['trackingNumber'] ?? null,
         ];
    });
} catch (ClientException $e) {
    $statusCode = $e->getResponse()->getStatusCode();
    $errorResponse = json_decode($e->getResponse()->getBody(), true);
    \Log::error("API Request failed with status code $statusCode. Error response: " . json_encode($errorResponse));
    return collect();
}
}
   public function create()
    {
        return view('orders.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'order_reference' => 'required|string|max:255',
        ]);

        $order = Order::create($validatedData);
        return redirect()->route('orders.index');
    }
public function delete(Request $request)
{
        $validatedData = $request->validate([
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:orders,id',
        ]);
        Order::destroy($validatedData['order_ids']);
        return redirect()->route('orders.index')->with('success', 'Orders deleted successfully');
    }
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
    
    public function search(Request $request)
    {
        $accountBatchNumber = $request->input('accountBatchNumber');
        $orders = $this->getOrdersFromAPI();
        $filteredOrders = $orders->where('accountBatchNumber', $accountBatchNumber);

// $printedOn =$request->input('printerOn');
// $orders = $this->getOrdersFromAPI();
// $filteredOrders = $orders->where('printerOn', $printerOn);
        return view('orders.index', ['orders' => $filteredOrders]);
    }
    public function reprint($orderId)
    {
        return redirect()->route('orders.index')->with('success', 'Order reprinted successfully.');
    }
    public function status()
    {
        // Add logic for the 'status' method
        return view('orders.status'); // Example: return a view
    }

}

