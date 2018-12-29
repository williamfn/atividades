<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Http\Requests\SaveAtividade;
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
        $data['titulo'] = 'Cadastro de Atividade';
        $data['atividade'] = (object) ['id' => 0];
        $data['desabilitado'] = false;

        if (!empty($idAtividade)) {
            $data['titulo'] = 'Alteração de Atividade';

            $data['atividade'] = Atividade::find($idAtividade);

            if ($data['atividade']->status == 4) {
                $data['desabilitado'] = 'readonly';
            }
        }

        Status::all()->each(function ($item, $key) use (&$data) {
            $tempStatus = $item->toArray();
            $data['statusDescricao'][$tempStatus['id']] = $tempStatus['status'];
        });

        return view('atividades/form', $data);
    }

    public function save(SaveAtividade $request)
    {
        dd($request->all());
    }
}
