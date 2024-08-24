@extends('products.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <center><h2>Product Report For ID No. {{$product->id}}</h2></center>
            </div>
           
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-danger" href="{{ route('products.index') }}"> Back</a>
    </div>
    
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Supplier</th>
            <th width="150px">Action</th>
        </tr>
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->unit }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->supplier->supplier }}</td>
            <td><button onclick="window.print()" class="btn btn-primary">Print Report</button></td>
        </tr>
        </table>
    {{-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unit:</strong>
                {{ $product->unit }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {{ $product->quantity }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $product->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Supplier:</strong>
                {{ $product->supplier->supplier }}
            </div>
        </div>
    </div> --}}
@endsection