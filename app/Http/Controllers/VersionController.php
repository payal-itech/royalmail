<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Version;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class VersionController extends Controller
{
    public function index()
    {
        $apiVersion = $this->getApiVersion();   
        return view('versions.index', compact('apiVersion'));
    }

    public function getApiVersion()
    {
        try {
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

            $response = $client->request('GET', 'version');
            return json_decode($response->getBody(), true);

        } catch (ClientException $e) {
            $statusCode = $e->getResponse()->getStatusCode();
            $errorResponse = json_decode($e->getResponse()->getBody(), true);

            \Log::error("API Request failed with status code $statusCode. Error response: " . json_encode($errorResponse));

            return null; // or handle the error accordingly
        }
    }
}
