<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Models\User;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $receitas = Receita::all();
      return view("adm/receita", compact('receitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all();
      return view("adm/receita/create", compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
        'user_id' => 'required|integer',
        'ingrediente' => 'required|max:255',
        'modo_de_preparo' => 'required|max:255',
      ]);
      if ($validated) {
        $receita = new Receita();
        $receita->user_id = $request->get('user_id');
        $receita->ingrediente = $request->get('ingrediente');
        $receita->modo_de_preparo = $request->get('modo_de_preparo');
        $receita->save();
        return redirect("receita");
      }
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
      $users = User::all();
      return view("adm/receita/edit", compact('receita', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receita $receita)
    {
      $validated = $request->validate([
        'user_id' => 'required|integer',
        'ingrediente' => 'required|max:255',
        'modo_de_preparo' => 'required|max:255',
      ]);
      if ($validated) {
        $receita->user_id = $request->get('user_id');
        $receita->ingrediente = $request->get('ingrediente');
        $receita->modo_de_preparo = $request->get('modo_de_preparo');
        $receita->save();
        return redirect("receita");
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
      $receita->delete();
      return redirect("receita");
    }
}
