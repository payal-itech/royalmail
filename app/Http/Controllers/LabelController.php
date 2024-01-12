<?php
// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\ClientException;
// class LabelController extends Controller
// {
//     public function index()
//     {
//         $labels = $this->getLabelsFromAPI();
//         return view('labels.index', compact('labels'));
//     }
//     private function getLabelsFromAPI()
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
//         $url = 'labels';
//         try {
//             $response = $client->request('GET', $url);
//             $labelsData = json_decode($response->getBody(), true);
//             return collect($labelsData['labels'] ?? [])->map(function ($labelData) {
//                 return [
//                     'type' => $labelData['accountOrderNumber'] ?? null,
//                     'title' => $labelData['channelOrderReference'] ?? null,
//                     'status' => $labelData['code'] ?? null,
//                     'traceId' => $labelData['message'] ?? null,
//                 ];
//             });
//         } catch (ClientException $e) {
//             $labelCode = $e->getResponse()->getStatusCode();
//             $errorResponse = json_decode($e->getResponse()->getBody(), true);
//             \Log::error("API Request failed with status code $labelCode. Error response: " . json_encode($errorResponse));
//             return collect();
//         }
//     }
// }
