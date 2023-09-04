<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Termwind\render;

class MainController extends Controller
{
    public function index(){
        return view('main.index');
    }
}
