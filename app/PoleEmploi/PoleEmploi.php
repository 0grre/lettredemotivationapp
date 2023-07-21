<?php

namespace App\PoleEmploi;

use Illuminate\Support\Collection;

class PoleEmploi
{
    public PoleEmploiClient $poleEmploiClient;

    public function __construct(PoleEmploiClient $poleEmploiClient)
    {
        $this->poleEmploiClient = $poleEmploiClient;
    }


    public function getCompanies(string $appellation): Collection
    {
//        $headers = [
//            'Content-Type' => 'application/x-www-form-urlencoded',
//        ];
//        $options = [
//            'form_params' => [
//                'grant_type' => 'client_credentials',
//                'client_id' => env('POLE_EMPLOI_CLIENT_ID'),
//                'client_secret' => env('POLE_EMPLOI_CLIENT_SECRET'),
//                'scope' => env('POLE_EMPLOI_SCOPE'),
//            ]];
//        $guzzle_request = new \GuzzleHttp\Psr7\Request('POST', 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=/partenaire', $headers);
//        $res = $this->poleEmploiClient->sendAsync($guzzle_request, $options)->wait();
//        $token = json_decode($res->getBody())->access_token;
//
//        $headers = [
//            'Authorization' => 'Bearer ' . $token
//        ];
//        $guzzle_request = new \GuzzleHttp\Psr7\Request('GET', 'https://api.pole-emploi.io/partenaire/rome-metiers/v1/metiers/appellation/' . $appellation->code, $headers);
//        $res = $this->poleEmploiClient->sendAsync($guzzle_request)->wait();
//        return json_decode($res->getBody());
    }
}
