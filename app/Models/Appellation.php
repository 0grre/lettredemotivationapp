<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appellation extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'code',
        'libelle',
    ];

    /**
     * @param $appellation_skills
     * @return string
     */
    public static function getSkills($appellation_skills): string
    {
        $skills = [];

        foreach ($appellation_skills as $skill){
            $skills[] = $skill->competence->libelle;
        }

        return json_encode($skills);
    }
}
