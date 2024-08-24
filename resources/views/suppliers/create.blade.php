@extends('suppliers.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Supplier</h2>
    </div>
        <div class="button-box">
        <div class="pull-right"><br>
            <a class="btn btn-danger" href="{{ route('suppliers.index') }}">CANCEL</a>
        </div>
        {{-- <div class="dashboard">
            <a class="btn btn-primary" href="{{ route('dashboard') }}"> Go to Dashboard</a>
        </div> --}}
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
   
<form action="{{ route('suppliers.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Supplier:</strong>
                <input type="text" name="supplier" class="form-control" placeholder="supplier" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Phone:</strong>
                <input type="number" name="phone" class="form-control" placeholder="phone" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="email" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><br>
                <strong>Address:</strong>
                <input type="text" name="address" class="form-control" placeholder="address" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"><br>
                <button type="submit" class="btn btn-primary">SAVE</button>
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