<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $title = 'Data - Wallacea Terminal';
        $description = 'ini deskripsi data di wallacea';
        return view('frontends.data', compact('title', 'description'));
    }
}
