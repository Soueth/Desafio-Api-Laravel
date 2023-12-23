<?php

namespace App\Http\Controllers;

use App\Models\Bandas;
use Exception;
use Illuminate\Http\Request;

class BandaController extends Controller
{
    public function home()
    {
        return view('extends.home');
    }

    public function cadastrar()
    {
        return view('extends.cadastro', [
            'instancia' => 'cadastrar'
        ]);
    }

    public function salvar(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required',
                'genero' => 'required'
            ]);

            if (Bandas::cadastrar($request)) {
                return view('extends.sucesso', [
                    'banda' => $request->input('nome')
                ]);
            } else {
                return view('extends.erro', [
                    'banda' => $request->input('nome')
                ]);
            }
        } catch (Exception $e) {
            echo 'Erro ao Realizar a ação' . $e->getMessage();
        }
    }

    public function deletar(Request $request, $id)
    {
        try {
            if (Bandas::deletar($id)) {
                return view('extends.sucesso', [
                    'banda' => $request->input('nome'),
                ]);
            } else {
                return view('extends.erro', [
                    'banda' => $request->input('nome'),
                ]);
            }
        } catch (Exception $e) {
            echo 'Erro ao Realizar a ação' . $e->getMessage();
        }
    }

    public function alterar(Request $request)
    {
        $banda = Bandas::findOrFail($request->input('banda_id'));

        return view('extends.alterar', [
            'instancia' => 'alterar',
            'nomeDaBanda' => $banda['nome'],
            'genero' => (string) $banda['genero'],
            'id' => $banda['id']
        ]);
    }

    public function editar(Request $request, $id)
    {

        $banda = Bandas::findOrFail($id);

        try {
            $validateData = $request->validate([
                'nome' => 'required|string|max:255',
                'genero' => 'required|string|max:255'
            ]);

            if (Bandas::atualizar($request, $id, $validateData)) {
                return view('extends.sucesso', [
                    'banda' => $request->input('nome'),
                ]);
            } else {
                return view('extends.erro', [
                    'banda' => $request->input('nome'),
                ]);
            }
        } catch (Exception $e) {
            echo 'Erro ao Realizar a ação' . $e->getMessage();
        }
    }

    public function verBandas()
    {
        $bandas = Bandas::listar();
        if ($bandas) {
            return view('extends.dados', compact('bandas'));
        } else {
            echo 'Ocorreu um erro ao buscar no banco de dados';
        }
    }
}
