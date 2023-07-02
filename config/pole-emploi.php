<?php

return [
    'realm' => env('POLE_EMPLOI_REALM', 'partenaire'),

    'client_id' => env('POLE_EMPLOI_CLIENT_ID'),

    'client_secret' => env('POLE_EMPLOI_CLIENT_SECRET'),

    'scope' => env('POLE_EMPLOI_SCOPE', 'nomenclatureRome appellationmetierpartenaire api_appellationmetierv1 api_explorateurmetiersv1 explojob api_rome-metiersv1 api_rome-competencesv1 api_rome-fiches-metiersv1 api_rome-contextes-travailv1'),
];
