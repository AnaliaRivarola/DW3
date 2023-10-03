<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	$dato='Hola mundo';
    	$dato2='Este es un test de variables';
    	return view('home',compact('dato','dato2'));

    }
}
