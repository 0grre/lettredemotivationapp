<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BaseMailLayout extends Component
{
    public function render(): View
    {
        return view('layouts.base-mail');
    }
}
