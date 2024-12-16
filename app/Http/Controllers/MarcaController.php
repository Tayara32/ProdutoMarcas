<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Nette\Utils\Paginator;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request )
    {
        $qtd = $request['qtd'] ?: 2;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];


        if ($buscar) {
            $marcas = Marca::where('nome', 'like', "%$buscar%")->paginate($qtd);
        } else {
            $marcas = Marca::paginate($qtd);
        }

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
    public function destroy($id)
    {
        if (Produto::where('marca_id', '=', $id)->count()) {
            $msg = "Não foi possível excluir a marca. Os produtos com id ("; $produtos = Produto::where('marca_id', '=', $id)->get();
            foreach ($produtos as $produto) {
                $msg .= $produto->id . ", ";
            }
            $msg .= " ) estão relacionados com a marca.";

            Session::flash('mensagem', ['msg'=>$msg]);
            return redirect()->route('marcas.index');
        }

        Marca::find($id)->delete();
        return redirect()->route('marcas.index');


    }

    public function produto($id){
        $marca = Marca::find($id);
        return view('marcas.produtos', compact('marca'));
    }
}
