<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home', [
            'title' => 'Home || Page'
        ]);
    }

    public function dada(){
        return view('dashboard.dada', [
            'title' => 'Dashboard || Page'
        ]);
    }
}
