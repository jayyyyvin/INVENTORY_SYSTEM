@extends('homelayout')
 
@section('content')
<div class="containertransaction">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="cardheader">
                        <h5><i class="fa-solid fa-table"></i> Transactions</h5>
                    </div>
                    <div class="searchproducts">
                        <form action="search_transaction" method="GET"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input id="searchInput" type="text" name='search' class="form-control bg-light border-1 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                        <div class="generatereport">
                            <form action="reportalltransactions" method="get">
                                <button class="btn btn-danger" type="submit">
                                Generate Report
                                </button>
                            </form>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>
                  
                </div>
                    <div class="card-body">
                        <div class="pull-left">
                            <a class="btn btn-success" href="{{ route('transactions.create') }}"> + Create New Transactions</a>
                        </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row"><div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="dataTable_length">
                    {{-- <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label> --}}
                </div>
            </div>
                <div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
                    {{-- <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label> --}}
                </div></div></div><div class="row"><div class="col-sm-12">   

    <table id="transactionTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

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
                <th>Action</th>
                
            </tr>
            </thead>
            <tbody id="transactionTableBody">
        @if ($transactions->count() > 0)
        @foreach ($transactions as $transaction)
       
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{$transaction->product->description}}</td>
            <td><center> @if($transaction->transaction_status =='Receive')<span class="badge badge-primary">Receive</span>
                @elseif($transaction->transaction_status =='Release')<span class="badge badge-secondary">Release</span>
                @endif </center>
            </td>
            <td><center>{{ $transaction->quantity }}</center></td>
            <td>
                @if($transaction->product_status=='New Stock')<span class="badge badge-success">New Stock</span>
                @elseif($transaction->product_status=='Old Stock')<span class="badge badge-warning">Old Stock</span>
                @endif
            </td>
            <td>
                @if($transaction->product_condition =='In good condition')<span class="badge badge-success">In good condition</span>
                @elseif($transaction->product_condition =='With damage')<span class="badge badge-danger">With damage</span>
                @endif
            </td>
            <td>{{ $transaction->other_details }}</td>
            <td>{{ $transaction->incode_by }}</td>
            <td>{{ $transaction->created_at->format('m/d/y') }}</td>
            <td>
                {{-- <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST"> --}}
   
                    {{-- <a class="btn btn-sm btn-info" href="{{ route('products.show',$product->id) }}"><i class="fa-solid fa-eye"></i> show</a> --}}
    
                    {{-- <a class="btn btn-sm btn-warning " href="{{ route('transactions.edit',$transaction->id) }}" ><i class="fa-solid fa-pen-to-square"></i></a><br></br> --}}
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$transaction->id}}"><i class="fa-solid fa-trash-can"></i></button>
                    {{-- @csrf
                    @method('DELETE')
      
                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </form>
                 --}}
                    
                    
                  
            </td>
              <!-- Logout Modal-->
              <div class="modal fade" id="deleteModal{{$transaction->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Transaction?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Are you sure you want to delete "{{$transaction->product->description}}?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            
                            <form action="{{ route('transactions.destroy',$transaction->id) }} " method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
        </tr>
        @endforeach
            </tbody>
        </div>
        </div>
        </div>
    </div>
    
    </table>
  
    {!! $transactions->links('pagination::bootstrap-5') !!}
    @else 
    <center><p>No Transactions found.</p></center>
@endif
                    
  

                    </div>
            </div>
        </div>
    </div>
</div>



<script>
     



            
    document.addEventListener('DOMContentLoaded', function() {
    var navItems = document.querySelectorAll('.nav-item');

    // Set the specific page path you want to be active
    var specificPagePath = "/transactions"; // Change this to your specific page path

    navItems.forEach(function(navItem) {
        var navItemLink = navItem.querySelector('a');

        // Check if the href attribute of the nav item is equal to the specific page path
        if (navItemLink && navItemLink.getAttribute('href') === specificPagePath) {
            navItem.classList.add('active');
        }
    });
});


</script>  


<style>
@media screen and (max-width:625px){
.generatereport{
    position: absolute;
    left: 45px;
    top: 99px;
}
}
@media screen and (max-width:480px){
.generatereport{
    position: absolute;
    left: 45px;
    top: 75px;
}
}

/* .card-header{
        background-color:lightgray;
    } */
</style> 
      
@endsection
