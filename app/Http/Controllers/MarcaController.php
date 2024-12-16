<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
           'nome' => 'required|max:255',
       ]);
        $marca = new Marca();
        $marca->nome = $validatedData['nome'];
        $marca->save();
       return redirect()->route('marcas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marca = Marca::find($id);
        return view('marcas.show' , compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marca = Marca::find($id);
        return view('marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
        ]);
        $marca = Marca::find($id);
        $marca-> nome = $validatedData['nome'];
        $marca ->save();

        return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca = Marca::find($id);
        $marca->delete();
        return redirect()->route('marcas.index');
    }
}
