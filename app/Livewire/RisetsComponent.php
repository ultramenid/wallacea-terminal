<?php

namespace App\Livewire;

use Livewire\Component;

class RisetsComponent extends Component
{
    public $deleteName, $deleteID, $deleter;
    public  $paginate = 10, $search = '';

    public function render()
    {
        $posts = [];
        return view('livewire.risets-component', compact('posts'));
    }
}
