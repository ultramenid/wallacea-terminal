<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class RisetsController extends Controller
{

    public function categoryriset($lang, $paramcategory){
        $title = 'Risets - Wallacea Terminal';
        $description = 'ini deskripsi riset di wallacea';
        $data = null;
        $nav = 'risets';
        $category = $paramcategory;
        $categories = $this->getCategory();
        $paramcategory = $paramcategory;
        return view('frontends.categoryriset', compact('title', 'description', 'categories','nav' ,'data', 'category', 'paramcategory'));
    }
    public function listrisets(){
        $title = 'Risets - Wallacea Terminal';
        $description = 'ini deskripsi riset di wallacea';
        $data = null;
        $nav = 'risets';
        $category = null;
        $categories = $this->getCategory();
        return view('frontends.risets', compact('title', 'description', 'categories','nav' ,'data', 'category'));
    }
    public function index(){
        $nav = 'riset';
        $title = 'Riset - Wallacea Terminal';
        return view('backends.risets', compact('nav', 'title'));
    }

    public function addriset(){
        $nav = 'riset';
        $title = 'Add new riset - Wallacea Terminal';
        return view('backends.addriset', compact('nav', 'title'));
    }

    public function editriset($id){
        $nav = 'riset';
        $id = $id;
        $title = 'Edit riset - Wallacea Terminal';
        return view('backends.editriset', compact('nav', 'title', 'id'));
    }

    public function getDetailRiset($id){
        return DB::table('risets')->where('id', $id)->first();
    }

    public function selectRisets(){
        if (App::getLocale() == 'en') {
            return 'id, "titleEN" as title, slug, img, category, publishdate, "descriptionEN" as description';
        }else{
            return 'id, "titleID" as title, slug, img, category, publishdate, "descriptionID" as description';
        }
    }

    public function relatedRiset($id, $category){
        return DB::table('risets')
        ->selectRaw($this->selectRisets())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('category', $category)
        ->where('status', 1)
        ->where('id', '!=', $id)
        ->inRandomOrder()
        ->limit(2)
        ->get();
    }

    public function getCategory(){
        return DB::table('risets')->distinct('category')->select('category')->where('status', 1)->get();
    }

    public function detailriset($lang, $id, $slug){
        $data = $this->getDetailRiset($id);
        $related = $this->relatedRiset($id, $data->category);
        // dd($data->category);

        $title = (app()->getLocale() == 'en' ) ? $data->titleEN : $data->titleID;
        $description = (app()->getLocale() == 'en' ) ? $data->descriptionEN : $data->descriptionID;
        $categories = $this->getCategory();
        $category = $data->category;
        // $region = '';
        $nav = 'riset';
        return view('frontends.detailriset', compact('data', 'title', 'description', 'data', 'related', 'categories', 'nav', 'category'));
    }


}
