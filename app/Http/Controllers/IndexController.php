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
        // dd($news);
        $title = 'Wallacea Terminal - Home';
        $description = 'ini deskripsi wallacea terminal';
        return view('frontends.index', compact('title', 'description', 'news', 'subcategory'));
    }

    public function getSubCategory(){
        return DB::table('news')->distinct('subcategory')->select('subcategory')->where('status', 1)->whereNotNull('subcategory')->get();
    }
    public function selectNews(){
        if (App::getLocale() == 'en') {
            return 'id, "titleEN" as title, slug, url, img, category, publishdate, "descriptionEN" as description';
        }else{
            return 'id, "titleID" as title, slug, url, img, category, publishdate, "descriptionID" as description';
        }
    }

    public function getNews(){
        return DB::table('news')
        ->selectRaw($this->selectNews())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->take(2)
        ->get();
    }
}
