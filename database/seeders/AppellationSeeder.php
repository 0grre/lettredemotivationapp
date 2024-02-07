<?php

namespace Database\Seeders;

use App\Models\Appellation;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class AppellationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $client = new Client();
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('POLE_EMPLOI_CLIENT_ID'),
                'client_secret' => env('POLE_EMPLOI_CLIENT_SECRET'),
                'scope' => env('POLE_EMPLOI_SCOPE'),
            ]];
        $request = new Request('POST', 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=/partenaire', $headers);
        $res = $client->sendAsync($request, $options)->wait();
        $token = json_decode($res->getBody())->access_token;

        $headers = [
            'Authorization' => 'Bearer ' . $token,
        ];

        $request = new Request('GET', 'https://api.pole-emploi.io/partenaire/rome-metiers/v1/metiers/appellation', $headers);
        $res = $client->sendAsync($request)->wait();

        $appellations = collect(json_decode($res->getBody()));

        foreach($appellations as $appellation){
            Appellation::firstOrCreate([
                "code" => $appellation->code,
                "libelle" => $appellation->libelle
            ]);
        }
    }
}
