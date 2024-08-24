@extends('transactions.layout')
  
@section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add New Transaction</h2>
                </div>
        
                <div class="pull-right">
                    <a class="btn btn-danger" href="{{ route('transactions.index') }}">CANCEL</a>
                </div>
            </div>
    </div>

   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Product Name:</strong>
                <select name="product_name" class="form-control">
                    <option selected disabled>--select product--</option>
                    @foreach($product as $list)
                        <option value="{{$list->id}}">{{$list->description}}</option>
                    @endforeach
                    </select>
                {{-- <input type="text" name="product_name" class="form-control" placeholder="product Name"> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Transaction Status:</strong><br>
                <input type="radio" name="transaction_status" id="receive"  value="Receive">
                <label>Receive</label><br>
                <input type="radio" name="transaction_status" id="release"  value="Release">
                <label>Release</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Quantity:</strong>
                <input type="number" name="quantity" class="form-control" placeholder="quantity" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Product Status:</strong><br>
                <input type="radio" name="product_status" id="new_stock"  value="New Stock">
                <label>New Stock</label><br>
                <input type="radio" name="product_status" id="old_stock"  value="Old Stock">
                <label>Old Stock</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Product Condition:</strong><br>
                <input type="radio" name="product_condition" id="good_condition"  value="In good condition">
                <label>In good condition</label><br>
                <input type="radio" name="product_condition" id="damage_condition"  value="With damage">
                <label>With damage</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Other Detail:</strong>
                <input type="text" name="other_details" class="form-control" placeholder="other details" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Incode By:</strong>
                <input type="text" name="incode_by" class="form-control" placeholder="incode by" value="{{ Auth::user()->name }}" required>
                 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"><br>
                <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    
   
</form>


@endsection