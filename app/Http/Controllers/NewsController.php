<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    public function index(){
        $title = 'News - Wallacea Terminal';
        $description = 'ini deskripsi news di wallacea';
        $nasional = null;
        $region = null;
        $nav = 'news';
        $subcategory = $this->getSubCategory();
        return view('frontends.news', compact('title', 'description', 'nasional', 'region', 'subcategory','nav'));
    }
    public function listsnews(){
        $nav = 'news';
        $title = 'News - Wallacea Terminal';
        return view('backends.news', compact('title', 'nav'));
    }

    public function addinternal(){
        $nav = 'news';
        $title = 'add internal news';
        return view('backends.addinternalnews',  compact('nav', 'title'));
    }

    public function getDetailNews($id){
        return DB::table('news')->where('id', $id)->first();
    }

    public function editnews($id){
        $detailnews = $this->getDetailNews($id);
        $title = 'edit news';
        $nav = 'news';
        return view('backends.editinternal', compact('title', 'nav', 'detailnews'));
    }


    public function addeksternal(){
        $nav = 'news';
        $title = 'add internal news';
        return view('backends.addeksternal',  compact('nav', 'title'));
    }

    public function editeksternal($id){
        $detailnews = $this->getDetailNews($id);
        $title = 'edit news';
        $nav = 'news';
        return view('backends.editeksternal', compact('title', 'nav', 'detailnews'));
    }

    public function selectNews(){
        if (App::getLocale() == 'en') {
            return 'id, "titleEN" as title, slug, url, img, category, publishdate, "descriptionEN" as description, source';
        }else{
            return 'id, "titleID" as title, slug, url, img, category, publishdate, "descriptionID" as description, source';
        }
    }

    public function relatedRandomNews($id, $category){
        return DB::table('news')
        ->selectRaw($this->selectNews())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('category', $category)
        ->where('status', 1)
        ->where('id', '!=', $id)
        ->inRandomOrder()
        ->limit(2)
        ->get();
    }

    public function detailnews($lang,$id, $slug){

        $data = $this->getDetailNews($id);
        $related = $this->relatedRandomNews($id, $data->category);
        $title = (app()->getLocale() == 'en' ) ? $data->titleEN : $data->titleID;
        $description = (app()->getLocale() == 'en' ) ? $data->descriptionEN : $data->descriptionID;
        $nasional = $data->category;
        $region = $data->subcategory;
        $nav = 'news';
        return view('frontends.detailnews', compact('data', 'title', 'description', 'data', 'related', 'nasional', 'region', 'nav'));
    }
    public function getSubCategory(){
        return DB::table('news')->distinct('subcategory')->select('subcategory')->where('status', 1)->whereNotNull('subcategory')->get();
    }


    public function internasional(){
        $title = 'International News - Wallacea Terminal';
        $description = 'Ini deskripsi internasional news ya';
        $nasional = 'Internasional';
        $region = null;
        $nav = 'news';
        $subcategory = $this->getSubCategory();
        return view('frontends.internasional', compact('title', 'description', 'subcategory', 'nasional', 'region', 'nav'));
    }

    public function nasional(){
        $title = 'Nasional News - Wallacea Terminal';
        $description = 'Ini deskripsi nasional news ya';
        $nasional = 'Nasional';
        $region = null;
        $nav = 'news';
        $subcategory = $this->getSubCategory();
        return view('frontends.nasional', compact('title', 'description', 'subcategory', 'nasional', 'region', 'nav'));
    }

    public function region($lang, $region){
        // dd($region);
        $title = $region.' News - Wallacea Terminal';
        $description = 'Ini deskripsi '.$region.' news ya';
        $nasional = 'Nasional';
        $region = $region;
        $nav = 'news';
        $subcategory = $this->getSubCategory();
        return view('frontends.region', compact('title', 'description', 'subcategory', 'nasional', 'region','nav'));
    }

}
