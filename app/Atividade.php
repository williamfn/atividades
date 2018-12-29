<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Collective\Html\Eloquent\FormAccessible;

class Atividade extends Model
{
    use FormAccessible;

    protected $dates = ['data_inicio', 'data_fim'];

    public static function getListaFiltrados($status, $situacao)
    {
        $query = DB::table('atividades');

        $query->join('status', 'atividades.status', 'status.id');

        $query->select(DB::raw('if (atividades.situacao = "A", "Ativo", "Inativo") as situacao_descricao, atividades.*, status.status as status, status.id as status_id'));

        if (!empty($status)) {
            $query->where('atividades.status', $status);
        }

        if (!empty($situacao)) {
            $query->where('atividades.situacao', $situacao);
        }

        return $query->get();
    }

    public function formDataInicioAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function formDataFimAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
