<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AksiController extends Controller
{
    public function getCategory(){
        return DB::table('aksi')->distinct('category')->select('category')->where('status', 1)->get();
    }

    public function index(){
        $title = 'Aksi - Wallacea Terminal';
        $description = 'ini deskripsi aksi di wallacea';
        $data = null;
        $nav = 'aksi';
        $category = null;
        $categories = $this->getCategory();
        return view('frontends.aksi', compact('title', 'description', 'categories','nav' ,'data', 'category'));
    }

    public function listaksi(){
        $title = 'Aksi - Wallacea Terminal';
        $nav = 'aksi';
        return view('backends.aksi', compact('title', 'nav'));
    }

    public function addaksi(){
        $title = 'Add aksi - Wallacea Terminal';
        $nav = 'aksi';
        return view('backends.addaksi', compact('title', 'nav'));
    }

    public function editaksi($id){
        $id = $id;
        $title = 'Edit aksi - Wallacea Terminal';
        $nav = 'aksi';
        return view('backends.editaksi', compact('id', 'title', 'nav'));
    }

    public function detailaksi($lang, $id, $slug){
        $data = $this->getDetailAksi($id);
        $related = $this->relatedAksi($id, $data->category);
        // dd($related);
        $title = (app()->getLocale() == 'en' ) ? $data->titleEN : $data->titleID;
        $description = (app()->getLocale() == 'en' ) ? $data->descriptionEN : $data->descriptionID;
        $categories = $this->getCategory();
        $category = $data->category;
        $nav = 'aksi';
        return view('frontends.detailaksi', compact('data', 'title', 'description', 'data', 'related', 'categories', 'nav', 'category'));
    }

    public function getDetailAksi($id){
        return DB::table('aksi')->where('id', $id)->first();
    }

    public function selectaksi(){
        if (App::getLocale() == 'en') {
            return 'id, "titleEN" as title, slug, img, category, publishdate, "descriptionEN" as description';
        }else{
            return 'id, "titleID" as title, slug, img, category, publishdate, "descriptionID" as description';
        }
    }

    public function relatedAksi($id, $category){
        return DB::table('aksi')
        ->selectRaw($this->selectaksi())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('category', $category)
        ->where('status', 1)
        ->where('id', '!=', $id)
        ->inRandomOrder()
        ->limit(2)
        ->get();
    }

    public function categoryaksi($lang, $paramcategory){
        $title = 'Aksi - Wallacea Terminal';
        $description = 'ini deskripsi riset di wallacea';
        $data = null;
        $nav = 'aksi';
        $categories = $this->getCategory();
        $paramcategory = $paramcategory;
        return view('frontends.categoryaksi', compact('title', 'description', 'categories','nav' ,'data', 'paramcategory'));
    }
}
