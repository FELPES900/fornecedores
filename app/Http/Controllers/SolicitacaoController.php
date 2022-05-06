<?php

namespace App\Http\Controllers;

// use App\Models\Fornecedor;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $solicitacao = Solicitacao::with('fornecedor')->simplePaginate();
        // aqui estamos falando para ele força para ele puxar a funação para funcionar oque eu quero
        $solicitacao = Solicitacao::with('fornecedor')->simplePaginate();

        // $fornecedores = DB::table('fornecedores')->get();
        // dd($solicitacao);
        // dd($users);
        
        // return response()->view('solicitacao.index', compact('solicitacao'));
        
        // return response()->view('solicitacao.index', compact('solictiacoes'),  ['fornecedores' => $users]);
        
        return response()->view('solicitacao.index', compact('solicitacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = DB::table('fornecedores')->get();

        return response()->view('solicitacao.create', compact('fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'selecione' => 'required',
            'data' => 'required'
        ]);

        $solicitacao = new Solicitacao;

        $solicitacao->forn_id = $request->input("selecione");
        $solicitacao->data = $request->input("data");
        // dd($solicitacao);
        $solicitacao->save();
    
        return redirect()->route('solicitacao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitacao $solicitacao, $id)
    {
        $solicitacao = Solicitacao::findOrFail($id);

        return view('solicitacao.show', compact('solicitacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitacao $fim_soli, $id)
    {
        $fim_soli = Solicitacao::findOrFail($id);
        $fornecedores = DB::table('fornecedores')->get();
        // $produtos = DB::table('produtos')->where('soli_id', '=', "$fim_soli->id")->get();   
        // $produtos = $fim_soli->produtos;   
        // dd($produtos);

        return view('solicitacao.edit', compact('fim_soli','fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitacao $solicitacao)
    {
        // dd($request);
        $request->validate([
            'selecione' => 'required',
            'data' => 'required'
        ]);
        
        // dd($request->all());
        
        $solicitacao->forn_id = $request->input("selecione");
        $solicitacao->data = $request->input("data");
        
        // dd($solicitacao);
        $solicitacao->save();
    
        return redirect()->route('solicitacao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitacao $fim_soli, $id)
    {
        $fim_soli = Solicitacao::findOrFail($id);

        if ($fim_soli->delete()) {
            return redirect()->route('solicitacao.index');
        }
    }
}
