<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FrontendAksi extends Component
{
    public $paginate = 10;
    use WithPagination;

    public function selectAksi(){
        if (App::getLocale() == 'en') {
            return 'id, "titleEN" as title, slug, img, category, publishdate, "descriptionEN" as description';
        }else{
            return 'id, "titleID" as title, slug, img, category, publishdate, "descriptionID" as description';
        }
    }

    public function getAksi(){
        return DB::table('aksi')
        ->selectRaw($this->selectAksi())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->paginate($this->paginate);
    }
    public function render()
    {
        $data = $this->getAksi();
        return view('livewire.frontend-aksi', compact('data'));
    }
}
