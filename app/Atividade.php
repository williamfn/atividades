<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Atividade extends Model
{
    public function getDataInicioAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getDataFimAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getSituacaoAttribute($value)
    {
        if ($value == '1') {
            return 'Ativo';
        } else {
            return 'Inativo';
        }
    }

}
