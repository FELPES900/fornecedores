<?php

namespace App\Http\Controllers;

use App\Models\Soli_Prod;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $solicitacao = DB::table('solicitacao')->get();
        $soli_prod = DB::table('solicitacoes_produtos')->get();

        if ($solicitacao->id == $soli_prod->soli_id ) {
            return response()->view('soli_prod.create', compact('solicitacao'));        
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // 2
    {
        $request->validate([
            'ID' => 'required'
        ]);

        // $soli_prod
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soli_Prod  $soli_Prod
     * @return \Illuminate\Http\Response
     */
    public function show(Soli_Prod $soli_Prod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soli_Prod  $soli_Prod
     * @return \Illuminate\Http\Response
     */
    public function edit(Soli_Prod $soli_Prod)
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
    public function update(Request $request, Soli_Prod $soli_Prod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soli_Prod  $soli_Prod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soli_Prod $soli_Prod)
    {
        //
    }
}
