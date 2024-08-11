<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Firebase\JWT\JWT;

class ZoomController extends Controller
{
    public function createMeeting()
    {
        // Zoom API base URL
        $baseUrl = 'https://api.zoom.us/v2';

        // Replace with your Zoom API key and secret
        $apiKey = 'BYxbgaRnSV6ac9jUDwZRmw';
        $apiSecret = 'JtjxTiiG4nbTN8RdrargCLXN1QDjYQLj';

        // Create a Guzzle HTTP client
        $client = new Client([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateZoomToken($apiKey, $apiSecret),
                'Content-Type' => 'application/json',
            ],
        ]);

        // Zoom API endpoint for creating a meeting
        $endpoint = '/users/me/meetings';

        // Request body with meeting details
        $data = [
            'topic' => 'Laravel Zoom Meeting',
            'type' => 2, // Scheduled Meeting
            'start_time' => now()->addMinutes(10)->toDateTimeString(), // Schedule the meeting for 10 minutes from now
            'duration' => 60, // Duration in minutes
        ];

        // Make a POST request to create a meeting
        $response = $client->post($endpoint, [
            'json' => $data,
        ]);

        // Decode the response JSON
        $result = json_decode($response->getBody(), true);

        // Output the meeting details
        dd($result);
    }

    private function generateZoomToken($apiKey, $apiSecret)
    {
        $tokenPayload = [
            'iss' => $apiKey,
            'exp' => time() + 60,
        ];

        return \Firebase\JWT\JWT::encode($tokenPayload, $apiSecret, 'HS256');
    }
}
