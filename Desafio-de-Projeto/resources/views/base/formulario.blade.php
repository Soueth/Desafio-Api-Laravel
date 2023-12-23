@extends('base.base')

<form action="@yield('rota')" method="@yield('metodo')">
    @csrf

    <div class="field">
        <label for="nome">Nome:</label>

        <input type="text" name="nome"

            @if ($instancia == 'cadastrar')
                placeholder="@yield('preenchimentoNome')"

            @elseif ($instancia == 'alterar')
                value="@yield('preenchimentoNome')"
            @endif
        >

    </div>

    <div class="field">
        <label for="genero">Gênero:</label>

        <input type="text" name="genero"

        @if ($instancia == 'cadastrar')
            placeholder="@yield('preenchimentoGenero')"

        @elseif ($instancia == 'alterar')
            value="@yield('preenchimentoGenero')"

        @endif
        >
    </div>

    <div>
        <button type="submit">@yield('submit')</button>
    </div>
</form>
