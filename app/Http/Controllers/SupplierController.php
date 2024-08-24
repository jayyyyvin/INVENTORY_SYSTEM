<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $supplier = Supplier::latest()->paginate(5);
        
        return view('suppliers.index',compact('supplier'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'supplier' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        
        Supplier::create($request->all());
         
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier): View
    {
        return view('suppliers.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier): View
    {
        //
        return view('suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier): RedirectResponse
    {
        //
        $request->validate([
            'supplier' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);
        
        $supplier->update($request->all());
        
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier): RedirectResponse
    {
        //
        $supplier->delete();
         
        return redirect()->route('suppliers.index')
                        ->with('success','Supplier deleted successfully');
    }

    public function supcountrecords(){
        $count = Supplier::count();
        return view('dashboard',['supcount'=>$count]);
    }



    public function listofsupplier(): View
    {
        //
        $supplier = Supplier::all();
        return view('products.create',['list'=>$supplier]);
    }

    public function reportallsupplier()
    {

        $supplier = Supplier::latest()->paginate(10);
        return view('suppliers.reportallsuppliers',compact('supplier'))
                        ->with('i', (request()->input('page', 1) - 1) * 10);
    }

}
