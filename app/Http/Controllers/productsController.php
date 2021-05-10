<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    private $Product;

    public function __construct(Product $Product){ 
        $this->Product = $Product;
    }

    public function index()
    {
        return view('products');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $dataform = $request->validate([
            'name' => 'required|max:150',
            'category' => 'required|max:100',
            'price' => 'required',
            'quantity' => 'required|integer',
            'expiration' => 'nullable|date',
        ]);
        
        try{
            $this->Product->create($dataform);

            return redirect()
                    ->back()
                    ->with('success', 'Produto cadastrado');
        }catch(\Exception $e){
            return redirect()
                ->back()
                ->with('error', 'Falha ao cadastrar',$e->mesage());
        
        }
    }


    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        return view ('products-show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        return view ('products-edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $dataform = $request->validate([
            'name' => 'required|max:150',
            'category' => 'required|max:100',
            'price' => 'required',
            'quantity' => 'required|integer',
            'expiration' => 'nullable|date',
        ]);
        
        $product = Product::where('id',$id)->first();

        try{
            $product->update($dataform);
            $success = true;
            return view ('products-show', compact('product','success'));
        }catch(\Exception $e){
            return redirect()
                ->back()
                ->with('error', 'Falha ao alterar',$e->mesage());
        
        }
    }


    public function destroy($id)
    {
        try{
            Product::destroy($id);
                return redirect()
                ->route('products.index')
                ->with('success', 'Produto excluido com sucesso!');
        }catch(\Exception $e){
            return redirect()
                ->back()
                ->with('error', 'Falha ao deletar',$e->mesage());
        
        }
    }

    public function search($id)
    {
        return ('pesquisa');
    }
}
