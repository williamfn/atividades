<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Status;
use Illuminate\Http\Request;

class AtividadesController extends Controller
{
    public function index(Request $request)
    {
        $data['statusSelecionado'] = $request->input('status');
        $data['situacaoSelecionado'] = $request->input('situacao');

        $data['atividades'] = Atividade::getListaFiltrados($data['statusSelecionado'], $data['situacaoSelecionado']);

        $data['filtroStatus'] = Status::all();
        $data['filtroSituacao'] = ['A' => 'Ativo', 'I' => 'Inativo'];

        return view('atividades/index', $data);
    }

    public function edit($idAtividade = null)
    {
        dd($idAtividade);
    }

    public function save()
    {

    }
}
