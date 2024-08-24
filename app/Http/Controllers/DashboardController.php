<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $supplier = Supplier::count();
        $productcount = Product::count();
  
        $countreceive = Transaction::where('created_at',now()->format('y/m/d'))
                                    ->where('transaction_status','Receive') ->count();
        // dd($countreceive);
        $countrelease = Transaction::where('created_at',now()->format('y/m/d') )
                                    ->where('transaction_status','Release')->count();

        $products = Product::where('quantity', '<=', 50)
                            ->paginate(5);
  
       
        
        return view('dashboard',compact('productcount','supplier','countreceive','countrelease','products')) 
                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    
}
