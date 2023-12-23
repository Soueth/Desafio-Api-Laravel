@extends('base.base')

@section('titulo', 'Página Inicial')

@section('conteudo')
    <form class="btn" action=" {{ route('bandas') }} ">
        <button type="submit">
            Ver Bandas
        </button>
    </form>

    <form class="btn" action="{{ route('cadastrar') }}">
        <button type="submit">
            Adicionar Banda
        </button>
    </form>
@endsection
