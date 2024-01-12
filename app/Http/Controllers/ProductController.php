<?php

// namespace App\Http\Controllers;
// use App\Models\Product;
// use GuzzleHttp\Clients;
// use GuzzalHttp\Exception\ClientException;
// use Illuminate\Http\Request;

// class ProductController extends Controller
// {
//     public function index()
//     {
//     $oders = $this->getProductFromApi();
//     return view('products.index', compact('products'));
//     }
//     private function getProductsFormApi()
//     {
//         $apikey = config('app.ROYALMAIL_API_KEY');
//         $apisecret=config('app.ROYALMAIL_API_SECRET_KEY');
//         $rtoken= congig('app.ROYALMAIL_API_TOKEN');
//         $client =new Client([
//             'base_uri' => 'https://api.parcel.royalmail.com/v1',
//             'header' => [
//                 'Content_Type' => 'Application/json',
//                 'Api-key' => $apiKey,
//                 'api-secret' => $secretKey,
//                 'Authorization' =>"Bearer" . $rtoken,
//             ],
//         ]);
//         $url = 'Products';
        
//     }
// }
