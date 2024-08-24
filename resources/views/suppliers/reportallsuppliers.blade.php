@extends('suppliers.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <center><h2>SUPPLIERS LIST REPORT</h2></center>
            </div>
           
        </div>
    </div>
<div class="boxbtn">
    <div class="pull-right">
        <a id="backpage" class="btn btn-danger" href="{{ route('suppliers.index') }}"> Back</a>
        {{-- <td><button onclick="window.print()" class="btn btn-primary">Print Report</button></td> --}}
    </div>
    <div class="printbtn">
        <button id="printPageButton" onclick="window.print()" class="btn btn-default"><i class="fa-solid fa-print"></i> Print</button>
    </div>
</div>
    
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Supplier</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
       
    </tr>
    @foreach ($supplier as $suppliers)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $suppliers->supplier }}</td>
        <td>{{ $suppliers->phone }}</td>
        <td>{{ $suppliers->email }}</td>
        <td>{{ $suppliers->address }}</td>
      
           
        </td>
    </tr>
    @endforeach
</table>

{!! $supplier->links('pagination::bootstrap-5') !!}
   
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