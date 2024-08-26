<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use DateTime;
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
  
        $receive = Transaction::where('date_created',now()->format('y/m/d'))->get();

        $options = [];
        foreach($receive as $count){
           $options[] =  Transaction::findorFail($count->id)->where('transaction_status')->get();
          
        }
        $countreceive = count($options);
        // $countreceive = 0;
        $countrelease = Transaction::where('date_created',now()->format('y/m/d') )
                                    ->where('transaction_status','Release')->count();

        $products = Product::where('quantity', '<=', 50)
                            ->paginate(5);
  
       
        
        return view('dashboard',compact('productcount','supplier','countreceive','countrelease','products')) 
                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    
}
