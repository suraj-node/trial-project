<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * This class will initiate the request to call our api and have resposiblity to return the data
 * to our command
 */
class GuzzleService
{
    public static function initiate(int $page)
    {
        try {
            $client = new Client();

            $apiUrl = \Config::get('constants.api_url');
            $apiKey = \Config::get('constants.api_key');

            $guzzleResponse = $client->get(
                $apiUrl,
                [
                    'query' => [
                        'api_key' => $apiKey,
                        'page[number]' => $page,
                    ],
                ]
            );
            if ($guzzleResponse->getStatusCode() == 200) {
                $response = json_decode($guzzleResponse->getBody(), true);
                return $response;
            }
        } catch (Exception $e) {
            \Log::info(__CLASS__ . $e);
        }
    }
}
