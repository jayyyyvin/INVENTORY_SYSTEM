<?php

namespace App\Http\Controllers;

use App\Models\Wearhouse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Product;



class WearhouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //  
        // $description = Product::with('description');

        $wearhouse = Wearhouse::latest()->paginate(5);
        
        return view('wearhouse.index',compact('wearhouse'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //

        if(auth()->user()->role_name == 'Staff' || auth()->user()->role_name == 'Supplier' ){
            abort(403);
        }else{
            $product = Product::all();
    
            return view('wearhouse.create', compact('product'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'supplier_name' => 'required',
            'product_name' => 'required',
            'quantity_in_stock' => 'required',
            'unit_price' => 'required',
            'total_value' => 'required',
            'other_details' => 'required',
            'audit_by' => 'required',
        ]);
        
      
        
        $product = Product::find($request->input('product_name'));
        
        if ($request->input('transaction_status')=='Release')
        {
            $product->quantity -= $request->input('quantity');
            $product->save();
        }
        else
        {
            $product->quantity += $request->input('quantity');
            $product->save();
        }


        Wearhouse::create($request->all());
        

        $wearhouse = Wearhouse::orderBy('created_at', 'desc')->get();


        return redirect()->route('wearhouse.index',compact('wearhouse'))
                        ->with('success','Product wearhouse successful.');
    }

    

  

   
    /**
     * Display the specified resource.
     */
    public function show(Wearhouse $transaction): View
    {
        //
        return view('wearhouse.show',compact('wearhouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wearhouse $wearhouse): View
    {
        //
        $product = Product::all();
        
        return view('wearhouse.edit',compact('wearhouse','product'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wearhouse $wearhouse): RedirectResponse
    {
        //
        $request->validate([
            'supplier_name' => 'required',
            'product_name' => 'required',
            'quantity_in_stock' => 'required',
            'unit_price' => 'required',
            'total_value' => 'required',
            'other_details' => 'required',
            'audit_by' => 'required',
        ]);
   
        $wearhouse->update($request->all());
  

       
        return redirect()->route('wearhouse.index')
                        ->with('success','wearhouse updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Wearhouse $wearhouse): RedirectResponse
    {

        $inputQuantity = $wearhouse->quantity;
        $actualQuantity = Product::where('description', $wearhouse->product->description)->first();

        if($wearhouse->wearhouse =='Receive')
            {
                $actualQuantity->quantity -= $inputQuantity;
                $actualQuantity->save();
            }
        elseif($wearhouse->wearhouse =='Release')
            {
                $actualQuantity->quantity += $inputQuantity;
                $actualQuantity->save();
            }


        $wearhouse->delete(); 
        return redirect()->route('wearhouse.index')
                        ->with('success','wearhouse deleted successfully');
    }




    public function search_wearhouse(Request $request){
        // $request->validate([
        //     'search' => 'required|string|max:255',
        // ]); 
        $data = $request->input('search');

        $query = Wearhouse::query();

        if (!empty($data)){
            $query->where('supplier_name', 'like', '%'.$data.'%')
            ->orWhere('product_name', 'like', '%'.$data.'%')
            ->orWhere('quantity_in_stock', 'like', '%'.$data.'%')
            ->orWhere('unit_price', 'like', '%'.$data.'%')
            ->orWhere('total_value', 'like', '%'.$data.'%')
            ->orWhere('other_details', 'like', '%'.$data.'%')
            ->orWhere('audit_by', 'like', '%'.$data.'%')
            ->orWhere('created_at', 'like', '%'.$data.'%')
           
        
            ->orWhereHas('product', function ($query) use ($data) {
                $query->where('description', 'like', "%$data%");
            });
        }
        
        $wearhouse = $query->orderBy('created_at', 'desc')->paginate(5);
                             
        $wearhouse->appends(['search' => $data]);                         
        
     

        return view('wearhouse.index', compact('wearhouse'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

       
       
    }


    // public function search_data_transaction(Request $request){
    //     $data = $request->input('search');
    //     $transactions = Product::where('description', 'like', '%'.$data.'%')
    //                             ->paginate(5);

    //     return view('transactions.index', compact('transactions'))
    //                 ->with('i', (request()->input('page', 1) - 1) * 5);
            
    //     $request->validate([
    //             'search' => 'required|string|max:255',
    //     ]);
                   
    // }


    public function reportallwearhouse()
    {

        if(auth()->user()->role_name == 'Staff'){
            abort(403);
        }else{
            $wearhouse = Wearhouse::latest()->paginate(10);
            return view('wearhouse.reportallwearhouse',compact('wearhouse'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        }
       
    }


   
}
