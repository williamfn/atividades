@extends('base')

@section('title')
    Lista de Atividades Duosystem
@endsection

@section('content')

    <div class="row form-group">
        <form action="/atividades" method="get"">
            <div class="col-md-1 filtro-label">Filtros</div>
            <div class="col-md-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="btn btn-group btn-default" onchange="this.form.submit()">
                    <option value="">Selecione</option>
                    @foreach($filtroStatus as $status)
                        <option value="{{ $status['id'] }}" @if ($statusSelecionado == $status['id']) selected @endif>{{ $status['status'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="situacao">Situação</label>
                <select name="situacao" id="situacao" class="btn btn-group btn-default" onchange="this.form.submit()">
                    <option value="">Selecione</option>
                    @foreach($filtroSituacao as $key => $situacao)
                        <option value="{{ $key }}" @if ($situacaoSelecionado == $key) selected @endif>{{ $situacao }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                    <th>Status</th>
                    <th>Situação</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @if (count($atividades) > 0)
                    @foreach ($atividades as $atividade)
                        @php
                            $concluido = ($atividade->status_id == env('STATUS_CONCLUIDO_ID'));
                            $class = 'info';
                            $label = 'Editar'
                        @endphp
                        <tr @if ($concluido) class="success" @endif>
                            <td>{{ $atividade->id }}</td>
                            <td>{{ $atividade->nome }}</td>
                            <td class="col-md-4">{{ $atividade->descricao }}</td>
                            <td>{{ \Carbon\Carbon::parse($atividade->data_inicio)->format('d/m/Y') }}</td>
                            <td>@if (!empty($atividade->data_fim)) {{ \Carbon\Carbon::parse($atividade->data_fim)->format('d/m/Y') }}@endif</td>
                            <td>{{ $atividade->status }}</td>
                            <td>{{ $atividade->situacao_descricao }}</td>
                            @if ($concluido) @php $class = 'success'; $label = 'Visualizar' @endphp @endif
                            <td><a class="btn btn-sm btn-block btn-{{ $class }}" href="atividades/edicao/{{ $atividade->id }}">{{ $label }}</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="10" class="text-center">Nenhuma atividade à ser exibida</td></tr>
                @endif
            </tbody>
        </table>
        <div class="row text-center">
            <a href="/atividades/edicao" class="btn btn-info">Adicionar atividade</a>
        </div>
        <div class="form-group"></div>
    </div>

@endsection