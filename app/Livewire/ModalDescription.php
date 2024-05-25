<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ModalDescription extends Component
{
    public $show = false;
    public $title ='', $description = '', $sumber ='', $tahun = '', $skala = '', $walidata='';

    #[On('trigerModal')]
    public function show($title, $description, $sumber, $tahun, $skala, $walidata)
    {
        $this->title = $title;
        $this->description = $description;
        $this->sumber = $sumber;
        $this->tahun = $tahun;
        $this->skala = $skala;
        $this->walidata = $walidata;
        $this->show = true;
    }

    public function closeDelete(){
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.modal-description');
    }
}
