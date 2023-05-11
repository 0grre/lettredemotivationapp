<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'libelle_sect_activite',
    ];

    protected $table = 'sectors';
}
