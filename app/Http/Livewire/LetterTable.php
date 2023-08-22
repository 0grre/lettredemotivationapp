<?php

namespace App\Http\Livewire;

use App\Helpers\CollectionHelper;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class LetterTable extends Component
{
    use WithPagination;

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    /**
     * @return View
     * @throws BindingResolutionException
     */
    public function render(): View
    {
        $letters = Auth::user()
            ->letters()
            ->whereNotNull('archived_at')
            ->orderBy('experience', 'ASC')
            ->get();

        $letters_with_appellation = $letters->filter(function ($model){
            return str_contains(strtolower($model->appellation->libelle), strtolower($this->search));
        });

        return view('livewire.letter-table', [
            'letters' => CollectionHelper::paginate($letters_with_appellation, 15)
        ]);
    }
}
