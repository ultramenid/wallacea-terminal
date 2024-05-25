<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RisetsController extends Controller
{
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

}
