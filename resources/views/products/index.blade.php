@extends('homelayout')
 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="cardheader">
                        <h5><i class="fa-solid fa-table"></i> Manage Products</h5>
                    </div>
                    <div class="searchproducts">
                <form action="search_data" method="GET"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input id="searchInput" type="text" name='search' class="form-control bg-light border-1 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2" value="{{ old('search', isset($search) ? $search : '') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
                </form>
                </div>
                    <div class="generatereport">
                        <form action="reportall" method="get">
                            <button class="btn btn-primary" type="submit">
                            Generate Report
                            </button>
                        </form>
                        {{-- <a href="{{ route('products.reportAll') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>
                </div>
                    <div class="card-body">
                        <div class="pull-left">
                            <a class="btn btn-success" href="{{ route('products.create') }}"> + Create New Product</a>
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
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Description</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Supplier</th>
            <th width="130px">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($products->count() > 0 )
       
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->unit }}</td>
            <td>@if ($product->quantity <= 50 )<span class="badge badge-danger">{{$product->quantity}}</span>
                @else {{$product->quantity}}
                @endif</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->supplier->supplier }}</td>
            <td>
   
                    <a class="btn btn-sm btn-info" href="{{ route('products.show',$product->id) }}"><i class="fa-solid fa-eye"></i></a>
    
                    <a class="btn btn-sm btn-warning" href="{{ route('products.edit',$product->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
 
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$product->id}}"><i class="fa-solid fa-trash-can"></i></button>
            
            </td>
                   <!-- Logout Modal-->
                   <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                   aria-hidden="true">
                   <div class="modal-dialog" role="document">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Delete product?</h5>
                               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">×</span>
                               </button>
                           </div>
                           <div class="modal-body">Are you sure you want to delete "{{$product->description}}?</div>
                           <div class="modal-footer">
                               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                               
                               <form action="{{ route('products.destroy',$product->id) }} " method="POST" >
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
        </table>
              
            
            
       
  
  
    {!! $products->links('pagination::bootstrap-5') !!}
     @else 
        <center><p>No products found.</p></center>
    @endif
</div>
</div>
</div>
</div>
</div>



<script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     const searchInput = document.getElementById('searchInput');
    //     const productTable = document.getElementById('dataTable');

    //     function performSearch() {
    //         const searchQuery = searchInput.value.toUpperCase();
    //         const rows = productTable.querySelectorAll('tbody tr');

    //         rows.forEach(row => {
    //             const productName = row.querySelector('td:nth-child(2)').textContent.toUpperCase();

    //             if (productName.includes(searchQuery)) {
    //                 row.style.display = '';
    //             } else {
    //                 row.style.display = 'none';
    //             }
    //         });
    //     }

    //     // Add event listener to the search input
    //     searchInput.addEventListener('input', function () {
    //         performSearch();
    //     });

    //     // Initial search when the page loads
    //     performSearch();
    // });





    document.addEventListener('DOMContentLoaded', function() {
    var navItems = document.querySelectorAll('.nav-item');

    // Set the specific page path you want to be active
    var specificPagePath = "/products"; // Change this to your specific page path

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
    left: 40px;
    top: 5px;
 
}
}
@media screen and (max-width:480px){
.generatereport{
    position: absolute;
    left: 40px;
    top: 5px;
 
}
}
    </style> 
          
      
@endsection