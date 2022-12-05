<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trainer;
use App\Models\Pokemon;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $trainers = Trainer::with('pokemons')->orderBy('id', 'desc')->paginate(10);

        if(request()->wantsJson()) return $trainers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pokemons' => 'array|min:6',
            'id_user' => 'required',
            'email' => 'required|email|unique:trainers,email',
            'name' => 'required',
            'last_name' => 'required',
            'second_last_name' => 'required',
            'birthdate' => 'required|date',
        ]);

        $trainer = new Trainer;
        $trainer->id_user =  $request->id_user;
        $trainer->email =  $request->email;
        $trainer->name =  $request->name;
        $trainer->last_name =  $request->last_name;
        $trainer->second_last_name =  $request->second_last_name;
        $trainer->birthdate =  $request->birthdate;
        $trainer->save();

        foreach ($request->pokemons as $key => $item) {
            $pokemon = new Pokemon;
            $pokemon->trainer_id = $trainer->id;
            $pokemon->name = $item['name'];
            $pokemon->id_api = $item['id'];
            $pokemon->save();
        }

        return [
            'message_type' => 'success',
            'message_text' => 'Has quedado registrado en el Torneo'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
