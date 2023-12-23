@extends('base.base')

@foreach ($bandas as $banda)
    <div>
        @foreach ($banda as $key => $value)
            <label for="{{ $key }}" class="teste">{{ ucfirst($key) }}:</label>
            <label for="{{ $key }}">{{ $value }}</label>
            <br>
        @endforeach

        <div>
            <form action="{{ route('delete', ['id' => $banda->id]) }}" class="inline-form" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar</button>
            </form>

            <form action="{{ route('alterar') }}" class="inline-form" method="GET">
                @csrf
                <input type="hidden" name="banda_id" value="{{ $banda->id }}">
                <button type="submit">Editar</button>
            </form>
        </div>
    </div>
@endforeach

