<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ProdutoController extends Controller
{
    public function index()
    {

        $results = Produtos::All();

        return $results;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'    => 'required|max:60|min:3',
            'valor'   => 'required|min:2|max:6',
            'ativo'   => 'boolean',
            'loja_id' => 'required|integer'
        ]);

        $produto = Produtos::create([
            'nome'      => $request->input('nome'),
            'valor'     => $request->input('valor'),
            'ativo'     => $request->input('ativo'),
            'loja_id'   => $request->input('loja_id'),

        ]);

        return response()->json(['success' => true]);
    }
    public function show(Produtos $produto)
    {
        return $produto;
    }
    public function update(Request $request, Produtos $produto)
    {
        $request->validate([
            'nome'    => 'max:60|min:3',
            'valor'   => 'min:2|max:6',
            'ativo'   => 'boolean',
            'loja_id' => 'integer'
        ]);

        if ($request->input('nome')) {
            $produto->nome      = $request->input('nome');
        }
        if ($request->input('valor')) {
            $produto->valor     = $request->input('valor');
        }
        if ($request->input('ativo')) {
            $produto->ativo     = $request->input('ativo');
        }
        if ($request->input('loja_id')) {
            $produto->loja_id   = $request->input('loja_id');
        }

        $produto->save();
        return $produto;
    }
    public function delete(Produtos $produto)
    {
        $produto->delete();
        return response()->json(['success' => true]);
    }
}