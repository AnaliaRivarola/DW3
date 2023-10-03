<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    public function index(){
    	$edad= '';
    	return view('pruebas.index',compact('edad'));
    } 
}
