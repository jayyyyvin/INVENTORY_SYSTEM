@extends('products.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
            <div class="button-box">
                <div class="pull-right">
                    <a class="btn btn-danger" href="{{ route('products.index') }}">CANCEL</a>
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
   
<form action="{{ route('products.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Description:</strong><br>
                <input type="text" name="description" class="form-control" placeholder="Description" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Unit:</strong>
                <select class="form-control" name="unit">
                <option selected disabled>--select unit--</option>
                <option>length</option>
                <option>pcs</option>
                <option>kls</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Quantity:</strong>
                <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong><br>
                <input type="number" step="0.01" name="price" class="form-control" placeholder="Price" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Supplier:</strong>
                {{-- <input type="text" id="searchInput" name="supplier" class="form-control" placeholder="supplier"> --}}
            <select name="supplier_id" class="form-control">
                <option selected disabled>--select supplier--</option>
                @foreach($supplier as $list)
                    <option value="{{$list->id}}">{{$list->supplier}}</option>
                @endforeach
                </select>
                {{-- <select class="form-control" name="supplier">
                <option></option>
                <option value="1">Ace Hardware</option>
                <option value="2">Citi Hardware</option>
                </select> --}}
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"><br>
                <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
     </div>
    </div>
</div>
    
   
</form>




<style>
    .button-box{
        display:flex;
    }
    .dashboard{
        padding-left:50px;
    }
</style>
@endsection