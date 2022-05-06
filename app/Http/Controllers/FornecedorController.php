<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fornecedores = Fornecedor::simplePaginate();

        return response()->view('fornecedores.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedores.create');
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
            'fornecedores' => ['required', 'max:100', 'min:3']
        ]);
            // dd($request);

        $fornecedor = new Fornecedor;

        $fornecedor->fornecedores = $request->input("fornecedores");
        $fornecedor->save();

        return redirect()->route('fornecedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        return view('fornecedores.show', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedore)
    {
        // dd($fornecedore);
        $request->validate([
            'fornecedores' => ['required', 'max:100', 'min:3']
        ]);

        // $fornecedor = Fornecedor::findOrFail($fornecedor);

        $fornecedore->fornecedores = $request->input("fornecedores");
        $fornecedore->save();
        // dd($fornecedor);

        // // METODO 2
        // // aqui estamos fazendo uma validação para ver se nao vai dar erro
        // if ($validator->fails()) {
        //     // com a função BACK ele retorna para a pagina anterior
        //     return back()->withErrors($validator)
        //         // aqui quando o cliente digitar algo quando ele 
        //         // apertar em salver caso de erro os dados que ele 
        //         // tinha colocado ainda ficaram ali com a função WTHINPUT
        //         ->withInput();
        // }

        return redirect()->route('fornecedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fornecedor $fornecedor, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        if ($fornecedor->delete()) {
            return redirect()->route('fornecedores.index');
        }
    }
}
