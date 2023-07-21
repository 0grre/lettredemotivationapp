<?php

namespace App\PoleEmploi;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Response;
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
     * @return mixed
     */
    public function base(string $method, string $endpoint): mixed
    {
        $headers = [
            'Authorization' => 'Bearer ' . $this->token
        ];
        $guzzle_request = new Request($method, 'https://api.pole-emploi.io/'. $this->realm .'/' . $endpoint, $headers);
        $res = $this->client->sendAsync($guzzle_request)->wait();

        return json_decode($res->getBody());
    }

    /**
     * @return array|mixed
     */
    public function authToken(): mixed
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
