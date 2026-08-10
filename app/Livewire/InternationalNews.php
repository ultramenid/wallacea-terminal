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

    // ponytail: arrays + select() let the grammar quote identifiers (backtick on MySQL, " on PostgreSQL); selectRaw with double quotes was read as a string literal on MySQL.
    public function selectNews(){
        if (App::getLocale() == 'en') {
            return ['id', 'titleEN as title', 'slug', 'url', 'img', 'category', 'publishdate', 'descriptionEN as description', 'source'];
        }else{
            return ['id', 'titleID as title', 'slug', 'url', 'img', 'category', 'publishdate', 'descriptionID as description', 'source'];
        }
    }

    public function getInternasional(){
        return DB::table('news')
        ->select($this->selectNews())
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
