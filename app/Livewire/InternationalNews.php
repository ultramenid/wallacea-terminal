<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class InternationalNews extends Component
{
    public $paginate = 10;
    use WithPagination;

    public function selectNews(){
        if (App::getLocale() == 'en') {
            return 'id, "titleEN" as title, slug, url, img, category, publishdate, "descriptionEN" as description';
        }else{
            return 'id, "titleID" as title, slug, url, img, category, publishdate, "descriptionID" as description';
        }
    }

    public function getInternasional(){
        return DB::table('news')
        ->selectRaw($this->selectNews())
        ->where('category', 'Internasional')
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->paginate($this->paginate);
    }



    public function render()
    {
        // dd($this->getInternasional());
        $data = $this->getInternasional();
        return view('livewire.international-news', compact('data'));
    }
}
