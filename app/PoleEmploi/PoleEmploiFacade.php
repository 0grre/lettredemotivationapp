<?php

namespace App\PoleEmploi;

use Illuminate\Support\Facades\Facade;


class PoleEmploiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PE';
    }
}
