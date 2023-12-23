@extends('base.formulario')

@section('submit', 'Alterar')

@section('rota', route('edit', ['id' => $id]))

@section('metodo', '')

<label for="id">ID: {{ $id }}</label>

@section('preenchimentoNome')
{{ $nomeDaBanda }}
@endsection

@section('preenchimentoGenero')
{{ $genero }}
@endsection
