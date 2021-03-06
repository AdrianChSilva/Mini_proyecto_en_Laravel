<?php

namespace PruebApp\Http\Controllers;

use Illuminate\Http\Request;
use PruebApp\Pokemon;
use PruebApp\Trainer;

class PokemonController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pokemons = Pokemon::all();
            return response()->json($pokemons, 200);
        }
        return view('pokemons.index');
    }

    public function store(Trainer $trainer, Request $request)
    {
        if ($request->ajax()) {

            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture');
            $pokemon->trainer()->associate($trainer)->save();
            //$pokemon->save();

            return response()->json([
                "pokemon" => $pokemon,
                "message" => "Pokemon creado correctamente"
            ], 200);
        }
    }
}
