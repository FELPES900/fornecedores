<?php

namespace App\Http\Controllers;

use App\Models\Soli_Prod;
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
    public function create() // 1
    {

        // $soli_prod = DB::table('solicitacoes_produtos')->get();
        $produtos = DB::table('produtos')->get();

        return response()->view('soli_prod.create', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // 2
    {
        //
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
