<?php

namespace App\Livewire;

use Livewire\Component;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{

    public $isOpen = true;
    public $search = '';
    public function render()
    {



        $searchResults = [];

        if (strlen($this->search) >= 2) {
            $searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/multi?query=' . $this->search)
                ->json()['results'];
        }
        // $searchResuts = Http::withToken(config('

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7)
        ]);
    }
}
