<?php

namespace App\PoleEmploi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Cache;

class PoleEmploiClient
{
    private Client $client;
    private string $realm;
    private string $token;

    /**
     *  Client constructor
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->realm = config('pole-emploi.realm');
        $this->token = Cache::remember('pole_emploi_api_token', 1399, function () {
            return self::authToken();
        });
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array|null $body
     * @return mixed
     */
    public function base(string $method, string $endpoint, array $body = null): mixed
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->token,
            "Content-Type" => "application/json; charset=utf8"
        ];
        $guzzle_request = new Request($method, 'https://api.pole-emploi.io/'. $this->realm .'/' . $endpoint, $headers, json_encode($body));
        $res = $this->client->sendAsync($guzzle_request)->wait();

        return json_decode($res->getBody());
    }

    /**
     * @return array|mixed
     */
    private function authToken(): mixed
    {
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => config('pole-emploi.client_id'),
                'client_secret' => config('pole-emploi.client_secret'),
                'scope' => config('pole-emploi.scope'),
            ]];
        $guzzle_request = new Request('POST', 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=/' . $this->realm, $headers);
        $res = $this->client->sendAsync($guzzle_request, $options)->wait();

        return json_decode($res->getBody())->access_token;
    }
}
