@extends('base')

@section('content')

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
                @foreach ($atividades as $atividade)
                    <tr>
                        <td>{{ $atividade->id }}</td>
                        <td>{{ $atividade->nome }}</td>
                        <td>{{ $atividade->descricao }}</td>
                        <td>{{ $atividade->data_inicio }}</td>
                        <td>{{ $atividade->data_fim }}</td>
                        <td>{{ $atividade->status }}</td>
                        <td>{{ $atividade->situacao }}</td>
                        <td><a class="btn btn-sm btn-info" href="atividades/{{ $atividade->id }}">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection