@extends('homelayout')

@section('content')  

   <!-- Content Row -->
  
   
   <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                           Total List of Products:
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$productcount}}</div>
                    </div>
                    <div class="col-auto">
                        {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                        <i class="fa-brands fa-product-hunt fa-2xl" style="color: #a6a6a6;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Total List of Suppliers:
                        </div> 
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$supplier}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-truck-field fa-2xl" style="color: #a6a6a6;"></i>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Pending Requests Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Transactions received (Today)
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countreceive}}</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-file-circle-plus fa-2xl" style="color: #a6a6a6;"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Transactions released (Today)
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countrelease}}</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-building-circle-arrow-right fa-2xl"style="color: #a6a6a6;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

                      

<div class="containerdashboard">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="cardhearder">
                    <h5><i class="fa-solid fa-table"></i> Critical Products</h5>
                    </div>
                    {{-- <div class="generatereport">
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div> --}}
                </div>
                    <div class="card-body">
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
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                            <th>No</th>
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
                    </div>
            </div>
        </div>
    </div>
</div>
   </div>
   <style>
    .containerdashboard{
        padding-top: 15px;
    }

    .card-header{
        display: flex;
    }

    .generatereport{
       
        margin-left: 550px;
    }

    
    
    .table.table-bordered{
        background-color:rgb(244, 247, 249);
    }
    .card-body{
        background-color:rgb(244, 247, 249);
    }
    /* .card-header{
        background-color:lightgray;
    } */
  .card.border-left-success.shadow.h-100.py-2{
    background-color:#3ce5be;
  }
  .card.border-left-primary.shadow.h-100.py-2{
    background-color:lightblue;
  }

    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var navItems = document.querySelectorAll('.nav-item');

    // Set the specific page route you want to be active
    var specificPageRoute = "{{ route('dashboard') }}"; // Change this to your specific page route

    navItems.forEach(function(navItem) {
        var navItemLink = navItem.querySelector('a');

        // Check if the href attribute of the nav item is equal to the specific page route
        if (navItemLink && navItemLink.href === specificPageRoute) {
            navItem.classList.add('active');
        }
    });
});
    </script>

@endsection
