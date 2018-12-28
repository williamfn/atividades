<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atividade;

class AtividadesController extends Controller
{
    public function index()
    {
        $atividades = Atividade::all();

        return view('atividades/index', ['atividades' => $atividades]);
    }

    public function edit($idAtividade)
    {
        dd($idAtividade);
    }
}
