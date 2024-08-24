@extends('products.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <center><h2>PRODUCT LIST REPORT</h2></center>
            </div>
           
        </div>
    </div>
<div class="boxbtn">
    <div class="pull-right">
        <a id="backpage" class="btn btn-danger" href="{{ route('products.index') }}"> Back</a>
        {{-- <td><button onclick="window.print()" class="btn btn-primary">Print Report</button></td> --}}
    </div>
    <div class="printbtn">
        <button id="printPageButton" onclick="window.print()" class="btn btn-default"><i class="fa-solid fa-print"></i> Print</button>
    </div>
</div>
    
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Description</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Supplier</th>
           
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->unit }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->supplier->supplier }}</td>
           
        </tr>
        @endforeach
    </table>
    {!! $products->links('pagination::bootstrap-5') !!}
   
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