<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::simplePaginate();

        return response()->view('produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pordutosUni = ['Kg', 'Unidade', 'Lts', 'Cx', 'Ton', 'Lta'];

        return view('produto.create', compact('pordutosUni'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $request->validate([
            'name'      => 'required',
            'unidade'   => 'required',
            'valor'     => 'required',
            'descricao' => 'required'
        ]);

        // dd($request);

        $produto = new Produto;

        $produto->name      = $request->input("name");
        $produto->unidade   = $request->input("unidade");
        $produto->valor     = $request->input("valor");
        $produto->descricao = $request->input("descricao");
        $produto->save();

        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projeto  $Produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produtos, $id)
    {

        $produtos = Produto::findOrFail($id);

        return view('produtos.show', compact('produtos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $Produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produtos, $id)
    {

        $produtos = Produto::findOrFail($id);
        $pordutosUni = ['Kg', 'Unidade', 'Lts', 'Cx', 'Ton', 'Lta'];

        return view('produto.edit', compact('produtos', 'pordutosUni'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $Produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        // dd($request->input());
        $request->validate([
            'name'      => 'required',
            'unidade'   => 'required',
            'valor'     => 'required',
            'descricao' => 'required'
        ]);

        $produto->name      = $request->input("name");
        $produto->unidade   = $request->input("unidade");
        $produto->valor     = $request->input("valor");
        $produto->descricao = $request->input("descricao");
        $produto->save();

        return redirect()->route('produtos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $Produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produtos, $id)
    {

        $produtos = Produto::findOrFail($id);

        if ($produtos->delete()){
            return redirect()->route('produtos.index');
        };

    }
}
