<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barrios;
class BarriosController extends Controller
{
    public function index()
    {
       $barrios = Barrios::All();
         return response()->json(['data'=>$barrios],200);
    }
}
