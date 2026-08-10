<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class RegionNews extends Component
{
    public $paginate = 10;
    public $region;
    use WithPagination;

    public function mount($region){
        // dd($region);
        $this->region = $region;
    }
    // ponytail: arrays + select() let the grammar quote identifiers (backtick on MySQL, " on PostgreSQL); selectRaw with double quotes was read as a string literal on MySQL.
    public function selectNews(){
        if (App::getLocale() == 'en') {
            return ['id', 'titleEN as title', 'slug', 'url', 'img', 'category', 'publishdate', 'descriptionEN as description', 'source'];
        }else{
            return ['id', 'titleID as title', 'slug', 'url', 'img', 'category', 'publishdate', 'descriptionID as description', 'source'];
        }
    }

    public function getRegion(){
        return DB::table('news')
        ->select($this->selectNews())
        ->where('category', 'Nasional')
        ->where('subcategory', $this->region)
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->paginate($this->paginate);
    }
    public function render()
    {
        $data = $this->getRegion();
        return view('livewire.region-news', compact('data'));
    }
}
