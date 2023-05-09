<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'duration',
        'sector',
        'skills',
        'company',
        'localization',
        'user_id',
    ];
}
