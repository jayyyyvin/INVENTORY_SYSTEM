@extends('homelayout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="cardheader">
                        <h5><i class="fa-solid fa-table"></i> WareHouse</h5>
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
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="dataTable_length">
                                        {{-- Optional length selection UI --}}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="dataTable_filter" class="dataTables_filter">
                                        {{-- Optional search filter UI --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">   
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Supplier</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($products->count() > 0 )
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>
                                                            @if($product->image)
                                                            <img style="height: 90px; width: 90px;" src='{{asset("storage/". $product->image)}}' alt="">
                                                            @else
                                                            <p>No Image</p>
                                                            @endif
                                                            </td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>{{ $product->unit }}</td>
                                                        <td>
                                                            @if ($product->quantity <= 50)
                                                                <span class="badge badge-danger">{{ $product->quantity }}</span>
                                                            @else
                                                                {{ $product->quantity }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->supplier->supplier }}</td>
                                                    </tr>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete product?</h5>
                                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">Are you sure you want to delete "{{ $product->description }}"?</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    
                                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else 
                                                <center><p>No products found.</p></center>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var navItems = document.querySelectorAll('.nav-item');
        var currentPath = window.location.pathname;

        navItems.forEach(function(navItem) {
            var navItemLink = navItem.querySelector('a');

            // Check if the href attribute of the nav item contains "warehouse" or "products"
            if (navItemLink && (
                currentPath.includes("/warehouse") && navItemLink.getAttribute('href').includes("/warehouse") ||
                currentPath.includes("/products") && navItemLink.getAttribute('href').includes("/products"))) {
                navItem.classList.add('active');
            } else {
                navItem.classList.remove('active');
            }
        });
    });
</script>

<style>
    @media screen and (max-width:625px){
        .generatereport {
            position: absolute;
            left: 40px;
            top: 5px;
        }
    }
    @media screen and (max-width:480px){
        .generatereport {
            position: absolute;
            left: 40px;
            top: 5px;
        }
    }
</style>

@endsection
