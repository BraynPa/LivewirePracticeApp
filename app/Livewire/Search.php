<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
    #[Validate('required')]
    public $searchText = '';
    public $results = [];
    public $placeholder;
    public function updatedSearchText($value){
        $this->reset('results');
        $this->validate();
        // $this->searchText = $value; 

        $searchTerm = "%$value%";

        $this->results = Article::where('title', 'like',$searchTerm)->get();
    }
    public function clear(){
        $this->reset('results','searchText');
    }
    public function render()
    {
        return view('livewire.search');
    }
}