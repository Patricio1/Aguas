<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barrios;
use DB;
class BarriosController extends Controller
{
    public function index()
    {

      $barrios = DB::table('barrios as c')                 
     ->select('c.id', 'c.nombre')
     ->get();
     return response()->json(['data'=>$barrios],200);

       //$barrios = Barrios::All();

       //$barrios = Barrios::take(1)->get();
        // return response()->json(['data'=>$barrios],200);
    }
    public function store(Request $request)
    {
        $barrio = Barrios::create($request->all());
        return response()->json($barrio,200);
    }
    public function update(Request $request)
    {
        $barrio = Barrios::findOrFail($request->id);
        $barrio->update($request->all());
        return response()->json($barrio,200);
    }
}
