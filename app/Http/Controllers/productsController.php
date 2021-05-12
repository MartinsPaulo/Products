<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Yajra\DataTables\Datatables;

use Illuminate\Http\Request;

class productsController extends Controller
{
    private $Product;

    public function __construct(Product $Product){
        $this->Product = $Product;
    }

    public function index()
    {
        $categories  = Category::where('active','1')->get();

        return view('products', compact('categories'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $dataform = $request->validate([
            'name' => 'required|max:150',
            'id_category' => 'required',
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
                ->with('error', 'Falha ao cadastrar: '.$e->getMessage());

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
        $categories  = Category::where('active','1')->get();
        return view ('products-edit', compact('product','categories'));
    }


    public function update(Request $request, $id)
    {
        $dataform = $request->validate([
            'name' => 'required|max:150',
            'id_category' => 'required',
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
                ->with('error', 'Falha ao alterar: '.$e->getMessage());

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
                ->with('error', 'Falha ao deletar: '.$e->getMessage());

        }
    }

    public function search($id)
    {
        return ('pesquisa');
    }

    public function getBasicData(Request $request)
    {
        $product = Product::with('category')->select('products.*');

        return Datatables::of($product)
            ->editColumn('name', '{{ $name }}')
            ->addColumn('action', function ($product) {
                return '<a href="/produto/alterar/'.$product->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Alterar</a>';
            })
            /*->addColumn('details', function ($product) {
                return '<a href="/produto/mostrar/'.$product->id.'" class="btn btn-xs btn-primary"><i class="bi bi-file-earmark-text"></i>Detalhes</a>';
            })*/
            ->editColumn('expiration', function ($product) {
                return $product->expiration->format('d/m/Y');
            })
            //filter column for day/month/year --optional
            ->filterColumn('expiration', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(expiration,'%Y/%m/%d') like ?", ["%$keyword%"]);
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }
}
