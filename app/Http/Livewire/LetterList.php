<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class LetterList extends Component
{
    public string $search = '';

    public function render(): View
    {
        $letters = Auth::user()->letters()->where('archived_at', null)->get();

        $letters_with_appellation = $letters->filter(function ($model) {
            return str_contains($model->appellation->libelle, $this->search);
        });

        return view('livewire.letter-list', [
            'letters' => $letters_with_appellation
        ]);
    }
}
