<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Receita;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
  use ApiResponse;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $receitas = Receita::all();
    return $this->success($receitas);
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
      'user_id' => 'required|integer|exists:App\Models\User,id',
      'ingrediente' => 'required|max:255|unique:receitas',
      'modo_de_preparo' => 'required|max:255',
    ]);
    if ($validated) {
      $receita = new Receita();
      $adotante->user_id = $request->get('user_id');
      $receita->ingrediente = $request->get('ingrediente');
      $receita->modo_de_preparo = $request->get('modo_de_preparo');
      $receita->save();
      return $this->success($receita);
    }
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