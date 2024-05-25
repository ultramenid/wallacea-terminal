<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $title = 'Data - Wallacea Terminal';
        return view('frontends.data', compact('title'));
    }
}
