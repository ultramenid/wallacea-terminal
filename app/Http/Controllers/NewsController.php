<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(){
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

}
