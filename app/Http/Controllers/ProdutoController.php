<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $qtd = $request['qtd'] ?: 2;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        if ($buscar) {
            $produtos = Produto::where('descricao', 'like', "%$buscar%")->paginate($qtd);
        } else {
            $produtos = Produto::paginate($qtd);
        }
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();
        return view('produtos.create', compact('marcas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $validatedData = $request->validate([
            'descricao' => 'required|max:255',
            'preco' => 'required|numeric',
            'peso' => 'required|numeric',
            'cor'  => 'required',
            'marca_id' => 'required|numeric',
        ]);

        $produto = new Produto($validatedData);
        $produto->save();
        return redirect()->route('produtos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);
        $marcas = Marca::all();
        return view('produtos.edit', compact('produto', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $validatedData = $request->validate([
           'descricao' => 'required|max:255',
           'preco' => 'required|numeric',
           'peso' => 'required|numeric',
           'cor'  => 'required',
           'marca_id' => 'required|numeric',
       ]);
       $produto = Produto::find($id);
       $produto->update($validatedData);
       $produto->save();
       return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
