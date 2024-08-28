@extends('homelayout')
 
@section('content')
<div class="containerorder">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="cardheader">
                        <h5><i class="fa-solid fa-table"></i> Orders</h5>
                    </div>
                    <div class="searchproducts">
                        <form action="search_order" method="GET"
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
                </div>
            </div>
                <div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
                </div></div></div><div class="row"><div class="col-sm-12">   

    <table id="orderTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
            <tr role="">
                <th>No</th>
                <th>Customer Name</th>
                <th>Shipping Address</th>
                <th>Payment Method</th>
                <th>Total Amount</th>
                <th>Status</th>

               
                <th>Action</th>
            
                
            </tr>
            </thead>
            <tbody id="orderTableBody">

            </tbody>
            </table>

     
       <script>
        fetch('https://theeshop.online/api/orders', {
            method: 'GET',
        }).then(response => response.json())
        .then(response => {
            console.log(response.data);
            let tbody = document.getElementById('orderTableBody');
            tbody.innerHTML = '';

            for(let i = 0; i < response.data.length; i++){
                let row = '<tr>' +
                    '<td>' + response.data[i].id + '</td>' +
                    '<td>' + response.data[i].id + '</td>' +
                    '<td>' + response.data[i].id + '</td>' +
                    '<td>' + response.data[i].payment_method + '</td>' +

                    '<td>' + response.data[i].total + '</td>' +
                    '<td>' + response.data[i].status + '</td>' +
                   '</tr>';

                   tbody.innerHTML += row;
            }
        })
        </script>


              
  
  
       
    </div>
    
   
   

    <center><p>No Orders found.</p></center>

                    
  

                    </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
    var navItems = document.querySelectorAll('.nav-item');

    // Set the specific page path you want to be active
    var specificPagePath = "/orders"; // Change this to your specific page path

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
</style> 
      
@endsection
