<?php

namespace App\Http\Controllers\Initial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        $carousel = [
            "imagens" =>
            [
              [
                "nome" => "carousel-1",
                "url" => "img/carousel/carousel-1.png"
              ], [
                "nome" => "carousel-2.png",
                "url" => "img/carousel/carousel-2.png"
              ]
            ]
          ];
        return view("Initial/inicio", $carousel);
    }
}
