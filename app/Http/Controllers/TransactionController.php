<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Product;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //  
        // $description = Product::with('description');

        $transactions = Transaction::latest()->paginate(5);
        
        return view('transactions.index',compact('transactions'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        $product = Product::all();
    
        return view('transactions.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'product_name' => 'required',
            'transaction_status' => 'required',
            'quantity' => 'required',
            'product_status' => 'required',
            'product_condition' => 'required',
            'other_details' => 'required',
            'incode_by' => 'required',
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


        Transaction::create($request->all());

        $transactions = Transaction::orderBy('created_at', 'desc')->get();


        return redirect()->route('transactions.index',compact('transactions'))
                        ->with('success','Product transaction successful.');
    }

    

  

   
    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction): View
    {
        //
        return view('transactions.show',compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction): View
    {
        //
        $product = Product::all();
        
        return view('transactions.edit',compact('transaction','product'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction): RedirectResponse
    {
        //
        $request->validate([
            'product_name' => 'required',
            'transaction_status' => 'required',
            'quantity' => 'required',
            'product_status' => 'required',
            'product_condition' => 'required',
            'other_details' => 'required',
            'incode_by' => 'required',
        ]);
   
        $transaction->update($request->all());
  

       
        return redirect()->route('transactions.index')
                        ->with('success','Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Transaction $transaction): RedirectResponse
    {

        $inputQuantity = $transaction->quantity;
        $actualQuantity = Product::where('description', $transaction->product->description)->first();

        if($transaction->transaction_status =='Receive')
            {
                $actualQuantity->quantity -= $inputQuantity;
                $actualQuantity->save();
            }
        elseif($transaction->transaction_status =='Release')
            {
                $actualQuantity->quantity += $inputQuantity;
                $actualQuantity->save();
            }


        $transaction->delete(); 
        return redirect()->route('transactions.index')
                        ->with('success','Transaction deleted successfully');
    }




    public function search_transaction(Request $request){
        // $request->validate([
        //     'search' => 'required|string|max:255',
        // ]); 
        $data = $request->input('search');

        $query = Transaction::query();

        if (!empty($data)){
            $query->where('transaction_status', 'like', '%'.$data.'%')
            ->orWhere('product_status', 'like', '%'.$data.'%')
            ->orWhere('product_condition', 'like', '%'.$data.'%')
            ->orWhere('other_details', 'like', '%'.$data.'%')
            ->orWhere('incode_by', 'like', '%'.$data.'%')
            ->orWhere('created_at', 'like', '%'.$data.'%')
        
            ->orWhereHas('product', function ($query) use ($data) {
                $query->where('description', 'like', "%$data%");
            });
        }
        
        $transactions = $query->orderBy('created_at', 'desc')->paginate(5);
                             
        $transactions->appends(['search' => $data]);                         
        
     

        return view('transactions.index', compact('transactions'))
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


    public function reportalltransaction()
    {

        $transactions = Transaction::latest()->paginate(10);
        return view('transactions.reportalltransactions',compact('transactions'))
                        ->with('i', (request()->input('page', 1) - 1) * 10);
    }


   
}
