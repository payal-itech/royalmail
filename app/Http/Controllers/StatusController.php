<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Status; 
// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\ClientException;

// class StatusController extends Controller
// {
//     public function index()
//     {
//         $statuses = $this->getStatusesFromAPI();
//         return view('statuses.index', compact('statuses'));
//     }

//     private function getStatusesFromAPI()
//     {
//         $apiKey = config('app.ROYALMAIL_API_KEY');
//         $secretKey = config('app.ROYALMAIL_SECRET_KEY');
//         $rtoken = config('app.ROYALMAIL_TOKEN');

//         $client = new Client([
//             'base_uri' => 'https://api.parcel.royalmail.com/api/v1/',
//             'headers' => [
//                 'Content-Type' => 'application/json',
//                 'Api-Key' => $apiKey,
//                 'Api-Secret' => $secretKey,
//                 'Authorization' => "Bearer " . $rtoken,
//             ],
//         ]);

//         $url = 'statuses';
// // dd($url);

//         try {
//             $response = $client->request('GET', $url);
//             $statusesData = json_decode($response->getBody(), true);
// dd($statusData);
// die();
//             return collect($statusesData['statuses'] ?? [])->map(function ($statusData) {
//                 return [
//                     'type' => $statusData['type'] ?? null,
//                     'title' => $statusData['title'] ?? null,
//                     'status' => $statusData['status'] ?? null,
//                     'traceId' => $statusData['traceId'] ?? null,
//                 ];
//             });
//         } catch (ClientException $e) {
//             $statusCode = $e->getResponse()->getStatusCode();
//             $errorResponse = json_decode($e->getResponse()->getBody(), true);
//             \Log::error("API Request failed with status code $statusCode. Error response: " . json_encode($errorResponse));

//             return collect();
//         }
//     }

// }
