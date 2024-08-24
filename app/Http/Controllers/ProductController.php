<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {   

        // $supplier = Supplier::with('supplier_id');
    //    dd($supplier);
        $products = Product::latest()->paginate(5);
     
        return view('products.index',compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
                   
    }

   
    public function indexdashboard(): View
    {
        $products = Product::latest()->paginate(5);
        
        return view('dashboard',compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // $supplier = Supplier::pluck('id','supplier');
        $supplier = Supplier::all();
        return view('products.create',compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'price' => 'required',  
            'supplier_id' => 'required'
        ]);
        
        Product::create($request->all());
         
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $supplier = Supplier::all();
        return view('products.edit',compact('product','supplier'));
    }

    public function reportall()
    {

      
        $products = Product::latest()->paginate(10);
        return view('products.reportall',compact('products'))
                        ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'supplier_id' => 'required'
        ]);
        
        $product->update($request->all());
        
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

   
    public function search_data(Request $request){
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $data = $request->input('search');
    
        $query = Product::query();
    
        if (!empty($data)) {
            $query->where('description', 'like', '%'.$data.'%')
                  ->orWhereHas('supplier', function ($query) use ($data) {
                      $query->where('supplier', 'like', "%$data%");
                  });
        }
    
        $products = $query->paginate(5);
    
        // Append the search parameter to the pagination links
        $products->appends(['search' => $data]);
    
        return view('products.index', compact('products'))
                    ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    
   

  
}
