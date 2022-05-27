<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoliProdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Solicitacao $solicitacao) // 1
    {

        // $id = Auth::user()->id;
        // $soli_prod = DB::select("SELECT * FROM solicitacoes_produtos WhERE soli_id = '$id'");
        // $soli_prod = DB::table('solicitacoes_produtos')->get();

        // dd($solicitacao->produtos);
        // $produto = Produto::find(4);
        $produtos = DB::table('produtos')->get();
        
        // $solicitacao->produtos()->attach($produto);
        // $solicitacao->produtos()->detach($produto);

        // insert into soli_prod soli_id, prod_id values (1,4); 

        // dd($solicitacao->refresh()->load('produtos'));

        return response()->view('soli_prod.create', compact('solicitacao','produtos'));        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Solicitacao $solicitacao) // 2
    {
        // dd($solicitacao);
        $request->validate([
            // 'solicitacao' => 'required',
            'produto' => 'required'
        ]);

        // $solicitacao->id = $request->input("produto");
        $solicitacao->produtos()->attach($request->produto);
        $solicitacao->save();

        // dd($request);

        // return response()->view('soli_prod.create');
        return redirect(route('soli_prod.create',$solicitacao->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soli_Prod  $soli_Prod
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soli_Prod  $soli_Prod
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soli_Prod  $soli_Prod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soli_Prod  $soli_Prod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitacao $solicitacao)
    {
        $idProduto = request()->input('idProduto');

        // dd(request()->input());
        $solicitacoes = DB::table("solicitacoes_produtos")->where(['soli_id'=> $solicitacao->id, 'prod_id'=> $idProduto])->delete();

        // dd($solicitacoes);
       return redirect()->route('soli_prod.create',$solicitacao->id);
    }
}
