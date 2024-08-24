<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory System</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link href={{ asset("css/sb-admin-2.min.css")}} rel="stylesheet">
    <link href={{ asset ("vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">
    <link href={{ asset ("js/sb-admin-2.min.css")}} rel="stylesheet">
    <link href={{ asset ("img/undraw_profile.svg")}} rel="stylesheet">


    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <hr class="sidebar-divider my-4">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                
                <div class="sidebar-brand-icon">
                    <img width="100px" height="100px" class="img-profile rounded-circle" src="{{ asset('storage/'. auth()->user()->profile_image) }}" alt="Profile Image">
                    <p class="rolename">
                        @if(Auth::user()->role_name)<span class="badge badge-success">{{Auth::user()->role_name}}</span>
                        @endif
                    </p>
                </div>
                {{-- <div class="sidebar-brand-text mx-3"></div> --}}
                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider my-4">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

         
            <!-- Nav Item - Transactions -->
            <li class="nav-item ">
                <a class="nav-link" href="/transactions">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Transactions</span></a>
            </li>

            <!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="/products">
                    <i class="fa-brands fa-product-hunt"></i>
                    {{-- <i class="fas fa-fw fa-table"></i> --}}
                    <span>Products</span></a>
            </li>

              <!-- Nav Item - suppliers -->
              <li class="nav-item">
                <a class="nav-link" href="/suppliers">
                    <i class="fa-solid fa-truck-field"></i>
                    <span>Suppliers</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Users -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Manage Users</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('register')}}"><i class="fa-solid fa-user-plus"></i> Add User</a>
                        <a class="collapse-item" href="{{route('forgotpass')}}"><i class="fa-solid fa-user-minus"></i> Forgot Password?</a>
                        <a class="collapse-item" href="{{route('userlist')}}"><i class="fa-solid fa-users"></i> Users List</a>
                    </div>
                </div>
            </li>

         

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div class="content" id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                     <!-- Topbar Search -->
 
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="">
                            <div class="titlehead">
                                <img width="230px" src="{{ asset('img/inventory_logo.png') }}" alt="systemlogo">
                            {{-- <h5>Inventory System</h5> --}}
                            <div>
                        </li>

                  
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{strtoupper(Auth::user()->name)}}</span>
                                {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
                                <img class="img-profile rounded-circle" src="{{ asset('storage/'. auth()->user()->profile_image) }}" alt="Profile Image">
                                {{-- <i class="fa-solid fa-bars"></i> --}}
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                                    <i class="fa-solid fa-user-plus text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fa-solid fa-right-from-bracket text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid pb-2 mb-2">
                    @yield('content')
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-whitesmoke">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Inventory System 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Profile Modal-->
     <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                <center>
                <div><img width="100px" height="100px" class="img-profile rounded-circle" src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Profile Image"></div>
                <br>
                <div><p>{{Auth::user()->name}} </p></div>
                <div><p>{{Auth::user()->email}} </p></div>
                <div><p>{{Auth::user()->role_name}} </p></div>
                <a class="btn btn-sm btn-secondary" href="{{ route('editprofile',Auth::user()->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit Profile?</a>
                &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-primary" href="{{ route('changepassword',Auth::user()->id)}}"><i class="fa-solid fa-pen-to-square"></i> Change Password?</a>
                </center>
            </div>
             <div class="modal-footer">
                 <button class="btn btn-danger" type="button" data-dismiss="modal">Back</button>
                
             </div>
         </div>
     </div>
 </div>

    <!-- Bootstrap core JavaScript-->
    <script src={{asset("vendor/jquery/jquery.min.js")}}></script>
    <script src={{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>

    <!-- Core plugin JavaScript-->
    <script src={{asset("vendor/jquery-easing/jquery.easing.min.js")}}></script>

    <!-- Custom scripts for all pages-->
    <script src={{asset("js/sb-admin-2.min.js")}}></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src={{asset("js/demo/chart-area-demo.js")}}></script>
    <script src={{asset("js/demo/chart-pie-demo.js")}}></script>

    <style>
        h5{
            color: black;
        }
    
    .titlehead{
        margin-top: 15px;
        margin-right: 200px;
    }
    
    .containerdashboard{
        padding-top: 15px;
    }

    .card-header{
        display: flex;
    }

    .generatereport{
       margin-left: 200px;
        width: 150px;
    }
  
    .cardheader{
        width: 200px;
    }

    .searchproducts{
        margin-left: 50px;
     
    }
    .search{
        border-style: solid;
    }
    
    /* Add this CSS to your stylesheet */
.nav-item.active span {
    /* color:#858796; */
     /* Change this to the desired text color */

}
.nav-item:hover span {
/* Change this to the desired text color */

}

.nav-item.active {
    background-color:#353dd0;

}

.nav-item.active:hover{
    background-color:#353dd0;

}

.nav-item:hover{
    background-color:rgb(103, 147, 239);
  
}

.nav-item.dropdown.no-arrow:hover {
    background-color: initial; /* or specify the default background color */
    color: initial; /* or specify the default text color */


}
.content{
    
}
@media screen and (max-width:480px){
.titlehead{
  display: none;
}
}


    </style>

<script>
    window.onload = function () {
        // Check if the page is being loaded for the first time or refreshed
        if (performance.navigation.type === 1) {
          
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Page refreshed!",
            showConfirmButton: false,
            timer: 1500
            });
        } 
    };

  
    document.addEventListener("DOMContentLoaded", function () {
        // Function to show SweetAlert for unauthorized access
        function showUnauthorizedAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Unauthorized Access',
                text: message,
                confirmButtonColor: '#d33',
            });
        }

        // Check for flashed unauthorized message
        @if(session('unauthorized'))
            showUnauthorizedAlert('{{ session('unauthorized') }}');
        @endif
    });


    document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    timer: 1500, // Set the time in milliseconds (1.5 seconds)
                    showConfirmButton: false // Hide the "OK" button
                });
            @elseif(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    timer: 1500, // Set the time in milliseconds (1.5 seconds)
                    showConfirmButton: false // Hide the "OK" button
                });
            @endif
        });




</script>



</body>

</html>