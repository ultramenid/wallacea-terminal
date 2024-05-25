<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $title = 'Wallacea Terminal - Home';
        $description = 'ini deskripsi wallacea terminal';
        return view('frontends.index', compact('title', 'description'));
    }
}
