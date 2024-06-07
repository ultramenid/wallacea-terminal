<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    public function index(){
        $title = 'Regulas - Wallacea Terminal';
        $nav = 'regulasi';
        $description = 'ini deskripsi regulasi wallacea terminal';
        return view('frontends.regulasi', compact('title', 'nav', 'description'));
    }
}
