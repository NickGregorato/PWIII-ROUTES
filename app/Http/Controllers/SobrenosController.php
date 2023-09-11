<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function principal()
    {
        $mensagem = "Sobre Nós...";
        return view('sobrenos', compact('mensagem'));
    }
}

