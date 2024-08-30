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
   
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="Image" required>
        </div>
        </div>
  
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
                <option>Lenovo</option>
                <option>Samsung</option>
                <option>Apple</option>
                <option>Acer</option>
                <option>Dell</option>
                <option>Asus</option>
                <option>Hp</option>
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
                <option value="1">Apple Inc</option>
                <option value="2">Lenove</option>
                <option value="3">Acer</option>
                <option value="4">Asus</option>
                <option value="5">Dell</option>
                <option value="6">Samsung</option>
                <option value="7">Hp Inc</option>
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