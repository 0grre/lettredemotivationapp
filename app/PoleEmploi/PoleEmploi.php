<?php

namespace App\PoleEmploi;

class PoleEmploi
{
    public PoleEmploiClient $poleEmploiClient;

    public function __construct(PoleEmploiClient $poleEmploiClient)
    {
        $this->poleEmploiClient = $poleEmploiClient;
    }

    /**
     * @param array $body
     * @param bool $feedback
     * @return mixed
     */
    public function appellationMetier(array $body, bool $feedback = false)
    {
        $endpoint = $feedback ? 'appellationmetier_feedback' : 'appelationmetier';

        return $this->poleEmploiClient->base('POST', 'appellationmetier/v1/' . $endpoint, $body);
    }

    /**
     * @param string $libelle
     * @param string $number
     * @param string $type
     * @return mixed
     */
    public function explorateurMetiers(string $libelle, string $number, string $type)
    {
        return $this->poleEmploiClient->base('GET', 'explorateurmetiers/v1/explorateurmetiers?libelle=' . $libelle . '&nombre=' . $number . '&type=' . $type);
    }

    /**
     * @return mixed
     */
    public function competences()
    {
        return $this->poleEmploiClient->base('GET', '');
    }

    /**
     * @param string $libelle
     * @return mixed
     */
    public function metiers(string $libelle)
    {
        return $this->poleEmploiClient->base('GET', '');
    }

    /**
     * @return mixed
     */
    public function contextesDeTravail(string $code = null, string $fields = null)
    {
        $request = '';
        if ($code) {
            $request = $fields ? $code . '?champs=' . $fields : $code;
        }
        return $this->poleEmploiClient->base('GET', 'rome-contextes-travail/v1/situations-travail/contexte-travail/' . $request);
    }

    /**
     * @param string|null $code
     * @param string|null $fields
     * @return mixed
     */
    public function ficheMetiers(string $code = null, string $fields = null)
    {
        $request = '';
        if ($code) {
            $request = $fields ? $code . '?champs=' . $fields : $code;
        }

        return $this->poleEmploiClient->base('GET', 'rome-fiches-metiers/v1/fiches-rome/fiche-metier/' . $request);
    }
}
