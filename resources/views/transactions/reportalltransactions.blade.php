@extends('transactions.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <center><h2>TRANSACTIONS LIST REPORT</h2></center>
            </div>
           
        </div>
    </div>
<div class="boxbtn">
    <div class="pull-right">
        <a id="backpage" class="btn btn-danger" href="{{ route('transactions.index') }}"> Back</a>
        {{-- <td><button onclick="window.print()" class="btn btn-primary">Print Report</button></td> --}}
    </div>
    <div class="printbtn">
        <button id="printPageButton" onclick="window.print()" class="btn btn-default"><i class="fa-solid fa-print"></i> Print</button>
    </div>
</div>
    
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <thead>
    <tr role="">
        <th>No</th>
        <th>Product_Name</th>
        <th>Transaction_Status</th>
        <th>Quantity</th>
        <th>Product_Status</th>
        <th>Product_Condition</th>
        <th>Other_Details</th>   
        <th>Incode_By</th>
        <th>Date_Created</th>
        
        
    </tr>
    </thead>
    <tbody>
@if ($transactions->count() > 0)
@foreach ($transactions as $transaction)

<tr>
    <td>{{ ++$i }}</td>
    <td>{{$transaction->product->description}}</td>
    <td><center>{{$transaction->transaction_status}}</center></td>
    <td><center>{{ $transaction->quantity }}</center></td>
    <td><center>{{$transaction->product_status}}</center></td>
    <td><center>{{$transaction->product_condition}}</center></td>
    <td>{{ $transaction->other_details }}</td>
    <td>{{ $transaction->incode_by }}</td>
    <td><center>{{ $transaction->created_at->format('m/d/y') }}</center></td>
   
</tr>
@endforeach
@endif
    </tbody>
</div>
</div>
</div>
</div>

</table>

{!! $transactions->links('pagination::bootstrap-5') !!}
   
    <style>
        .printbtn{
            position: relative;
            left: 85%;
        }    
        .boxbtn{
            display: flex;
        }
        @media print {
            #printPageButton {
            display: none;
            }
            #backpage{
                display: none;
            }
        }
    </style>
@endsection