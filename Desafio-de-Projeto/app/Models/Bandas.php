<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Bandas extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'genero'];
    public $timestamps = false;

    public static function cadastrar(Request $request)
    {
        return self::insert([
            'nome' => $request->input('nome'),
            'genero' => $request->input('genero')
        ]);
    }

    public static function listar()
    {
        return json_decode(self::select([
            'id',
            'nome',
            'genero'
        ])
        ->get());
    }

    public static function atualizar(Request $request, $id, $validateData)
    {
        $banda = self::findOrFail($id);

        return $banda->update($validateData);
        ;
    }

    public static function deletar($id)
    {
        $del = self::findOrFail($id);
        return $del->delete();
    }
}
