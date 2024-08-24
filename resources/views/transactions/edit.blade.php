@extends('transactions.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product transaction</h2>
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
  
    <form action="{{ route('transactions.update',$transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"><br>
                    <strong>Product Name:</strong>
                    {{-- <input type="text" name="product_name" value="{{ $transaction->product_name }}" class="form-control" placeholder="product name"> --}}
                    <select name="product_name" class="form-control">
                        <option value="{{$transaction->product_name}}">{{$transaction->product->description}}</option>
                        @foreach($product as $list)
                            <option value="{{$list->id}}">{{$list->description}}</option>
                        @endforeach
                        </select>
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group"><br>
                        <strong>Transaction Status:</strong><br>
                        @if($transaction->transaction_status=="Receive")
                        <input type="radio" name="transaction_status" id="receive"  value="Receive" @checked(true)>
                        <label>Receive</label><br>
                        <input type="radio" name="transaction_status" id="release"  value="Release" @checked(false)>
                        <label>Release</label>
                        @else
                        <input type="radio" name="transaction_status" id="receive"  value="Receive" @checked(false)>
                        <label>Receive</label><br>
                        <input type="radio" name="transaction_status" id="release"  value="Release" @checked(true)>
                        <label>Release</label>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group"><br>
                        <strong>Quantity:</strong>
                        <input type="number" name="quantity" value="{{ $transaction->quantity }}" class="form-control" placeholder="quantity" id="quantity">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group"><br>
                        <strong>Product Status:</strong><br>
                        @if($transaction->product_status=="New Stock")
                        <input type="radio" name="product_status" id="new_stock"  value="New Stock" @checked(true)>
                        <label>New Stock</label><br>
                        <input type="radio" name="product_status" id="new_stock"  value="Old Stock" @checked(false)>
                        <label>Old Stock</label>
                        @else
                        <input type="radio" name="product_status" id="new_stock"  value="New Stock" @checked(false)>
                        <label>New Stock</label><br>
                        <input type="radio" name="product_status" id="old_stock"  value="Old Stock" @checked(true)>
                        <label>Old Stock</label>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group"><br>
                        <strong>Product Condition:</strong><br>
                        @if($transaction->product_condition=="In good condition")
                        <input type="radio" name="product_condition" id="good_condition"  value="In good condition" @checked(true)>
                        <label>In good condition</label><br>
                        <input type="radio" name="product_condition" id="damage_condition"  value="With damage" @checked(false)>
                        <label>With damage</label>
                        @else
                        <input type="radio" name="product_condition" id="good_condition"  value="In good condition" @checked(false)>
                        <label>In good condition</label><br>
                        <input type="radio" name="product_condition" id="damage_condition"  value="With damage" @checked(true)>
                        <label>With damage</label>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group"><br>
                        <strong>Other Details:</strong>
                        <input type="text" name="other_details" value="{{ $transaction->other_details }}" class="form-control" placeholder="other detail">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group"><br>
                        <strong>Incode By:</strong>
                        <input type="text" name="incode_by" value="{{ $transaction->incode_by }}" class="form-control" placeholder="incode by">
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">SAVE</button>
            </div>
        </div>
   
    </form>
@endsection