<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FrontendCategoryAksi extends Component
{
    public $paginate = 10;
    public $paramcategory;
    use WithPagination;

    public function mount($paramcategory){
        $this->paramcategory = $paramcategory;
    }
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
        ->where('category', $this->paramcategory)
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->paginate($this->paginate);
    }

    public function render()
    {
        $data = $this->getAksi();
        return view('livewire.frontend-category-aksi', compact('data'));
    }
}
