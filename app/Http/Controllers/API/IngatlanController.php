<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ingatlanok;
use App\Models\kategoriak;
use Illuminate\Http\Request;

class IngatlanController extends Controller
{
    public function index()
    {
        return response()->json(Ingatlanok::with('kategoria')->get());
    }
    public function store(Request $request)
    {

        $ingatlan = new ingatlanok();
        $ingatlan->kategoria = $request->kategoria;
        $ingatlan->leiras = $request->leiras;
        $ingatlan->hirdetesDatuma = $request->hirdetesDatuma;
        $ingatlan->tehermentes = $request->tehermentes;
        $ingatlan->ar = 2000000;
        $ingatlan->kepURL = $request->kepURL;
        $ingatlan->save();

        $response = array(
            'kategoria' => $request->kategoriaSelect,
            'ingatlan' => $request->leiras,
            'datum' => $request->datum,
            'tehermentes' => $request->tehermentes,
            'tagokneve' => $request->ar,
            'fenykep' => $request->kep,
            'msg'    => 'Setting created successfully',
        );

        return ($response);
    }

    public function destroy($id)
    {
        $bolcsode = ingatlanok::findOrFail($id);
        $bolcsode->delete();
    }

    public function ingatlanokMegjelenitRezponzivban()
    {
        $ingatlanok = ingatlanok::all();
        $kategoriakNev = kategoriak::all();
        return view('welcome', compact('ingatlanok', 'kategoriakNev'));
    }
}
