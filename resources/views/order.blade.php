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
                                <input id="searchInput" type="text" name="search" class="form-control bg-light border-1 small" placeholder="Search for..."
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
                    <table id="orderTable" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
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
                            <!-- Order data will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Highlight the active navigation item
        const navItems = document.querySelectorAll('.nav-item');
        const specificPagePath = "/orders";
        navItems.forEach(navItem => {
            const navItemLink = navItem.querySelector('a');
            if (navItemLink && navItemLink.getAttribute('href') === specificPagePath) {
                navItem.classList.add('active');
            }
        });

        // Fetch orders and populate the table
        fetch('https://theeshop.online/api/orders', { method: 'GET' })
            .then(response => response.json())
            .then(response => {
                const tbody = document.getElementById('orderTableBody');
                tbody.innerHTML = '';

                response.data.forEach(order => {
                    const row = `<tr>
                        <td>${order.id}</td>
                        <td>${order.customer_name}</td>
                        <td>${order.shipping_address}</td>
                        <td>${order.payment_method}</td>
                        <td>${order.total}</td>
                        <td>${order.status}</td>
                        <td>
                            <!-- Add action buttons here -->
                        </td>
                    </tr>`;
                    tbody.innerHTML += row;
                });
            });
    });
</script>

<style>
    @media screen and (max-width: 625px) {
        .generatereport {
            position: absolute;
            left: 45px;
            top: 99px;
        }
    }
    @media screen and (max-width: 480px) {
        .generatereport {
            position: absolute;
            left: 45px;
            top: 75px;
        }
    }
</style>
@endsection
