<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $subcategory = $this->getSubCategory();
        $news = $this->getNews();
        $risets = $this->getRisets();
        $aksi = $this->getAksi();
        // dd($aksi);
        $nasional = null;
        $region = null;
        $nav = null;
        $title = 'Wallacea Terminal - Home';
        $description = 'ini deskripsi wallacea terminal';
        return view('frontends.index', compact('title', 'description', 'news', 'subcategory', 'region', 'nasional', 'nav', 'risets', 'aksi'));
    }

    public function getSubCategory(){
        return DB::table('news')->distinct('subcategory')->select('subcategory')->where('status', 1)->whereNotNull('subcategory')->get();
    }

    public function getRisets(){
        return DB::table('risets')
        ->selectRaw($this->selectRisets())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->take(2)
        ->get();
    }

    public function selectRisets(){
        if (App::getLocale() == 'en') {
            return 'id, "titleEN" as title, slug, img, category, publishdate, "descriptionEN" as description';
        }else{
            return 'id, "titleID" as title, slug, img, category, publishdate, "descriptionID" as description';
        }
    }

    public function selectNews(){
        if (App::getLocale() == 'en') {
            return 'id, "titleEN" as title, slug, url, img, category, publishdate, "descriptionEN" as description, source';
        }else{
            return 'id, "titleID" as title, slug, url, img, category, publishdate, "descriptionID" as description, source';
        }
    }

    public function getNews(){
        return DB::table('news')
        ->selectRaw($this->selectNews())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->take(1)
        ->get();
    }

    public function getAksi(){
        return DB::table('aksi')
        ->selectRaw($this->selectRisets())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->first();
    }
}
