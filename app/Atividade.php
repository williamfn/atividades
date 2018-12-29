<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Collective\Html\Eloquent\FormAccessible;

class Atividade extends Model
{
    use FormAccessible;

    protected $fillable = ['nome', 'descricao', 'data_inicio', 'data_fim', 'status', 'situacao'];
    public $timestamps = false;

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

        return $query->orderBy('id')->get();
    }

    public function formDataInicioAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function formDataFimAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function setDataInicioAttribute($value)
    {
        $dataInicio = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['data_inicio'] = $dataInicio->format('Y-m-d');
    }

    public function setDataFimAttribute($value)
    {
        if (!empty($value)) {
            $dataFim = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
        } else {
            $dataFim = null;
        }

        $this->attributes['data_fim'] = $dataFim;
    }

}
