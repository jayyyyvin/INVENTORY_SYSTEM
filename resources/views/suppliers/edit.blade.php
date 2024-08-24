@extends('suppliers.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Supplier</h2>
            </div>
            <div class="pull-right"><br>
                <a class="btn btn-danger" href="{{ route('suppliers.index') }}">CANCEL</a>
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
  
    <form action="{{ route('suppliers.update',$supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"><br>
                    <strong>Supplier:</strong>
                    <input type="text" name="supplier" value="{{ $supplier->supplier }}" class="form-control" placeholder="Supplier" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"><br>
                    <strong>Phone:</strong>
                    <input type="number" name="phone" value="{{ $supplier->phone }}" class="form-control" placeholder="Phone" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"><br>
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $supplier->email }}" class="form-control" placeholder="Email" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"><br>
                    <strong>Address:</strong>
                    <input type="text" name="address" value="{{ $supplier->address }}" class="form-control" placeholder="address" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a><br></a>
              <button type="submit" class="btn btn-primary">UPDATE</button>
            </div>
        </div>
   
    </form>
@endsection