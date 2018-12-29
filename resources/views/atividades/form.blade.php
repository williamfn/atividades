@extends('base')

@section('title')
    {{ $titulo }}
@endsection

@section('content')

    <div class="col-md-8 col-md-offset-2">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($atividade, ['route' => ['atividade.save']]) !!}

            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', null, ['class' => 'form-control', $desabilitado]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('descricao', 'Descrição') !!}
                {!! Form::textarea('descricao', null, ['class' => 'form-control', $desabilitado]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data_inicio', 'Data Inicial') !!}
                {!! Form::text('data_inicio', null, ['class' => 'form-control', 'maxlength' => 10, $desabilitado]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('data_fim', 'Data Final') !!}
                {!! Form::text('data_fim', null, ['class' => 'form-control', 'maxlength' => 10, $desabilitado]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Status') !!}
                {!! Form::select('status', $statusDescricao, null, ['placeholder' => 'Selecione', 'class' => 'form-control', $desabilitado]) !!}
            </div>

            <div class="form-group">
                <label class="radio-inline">
                    {!! Form::radio('situacao', 'A', null, [$desabilitado]) !!} Ativo
                </label>

                <label class="radio-inline">
                    {!! Form::radio('situacao', 'I', null, [$desabilitado]) !!} Inativo
                </label>
            </div>

            <div class="row text-center">
                {!! Form::button('Voltar', ['class' => 'btn btn-danger', 'onclick' => 'window.location="'.url("/atividades").'"']) !!}
                @if (!$desabilitado)
                    {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                @endif
            </div>

            {!! Form::hidden('id') !!}

            {!!  Form::token() !!}
        {!! Form::close() !!}
    </div>

@endsection