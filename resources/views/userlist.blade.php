@extends('homelayout')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="cardheader">
                        <h5> <i class="fa-solid fa-users"></i> Manage Users</h5>
                        </div>
                        <div class="generatereport1">
                            <form action="reportallsuppliers" method="get">
                                {{-- <button class="btn btn-primary" type="submit">
                                Generate Report
                                </button> --}}
                            </form>
                        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                        </div>
                  
                </div>
                    <div class="card-body">
                        <div class="pull-left">
                            {{-- <a class="btn btn-success" href="{{ route('suppliers.create') }}"> + Create New Supplier</a> --}}
                        </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
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
            <th>Profile</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role_Name</th>
            <th width="50px">Action</th>
        </tr>
        @foreach ($user as $users)
        @if($users->id !== Auth::id()) {{-- Skip the current user --}}
        <tr>
            <td>{{ ++$i }}</td>
            <td>
                @if ($users->profile_image)
                <img src="{{ asset('storage/'. $users->profile_image) }}" alt="Profile Image" style="max-width: 50px; max-height: 50px;">
                @else
                No Image
                @endif
            </td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->role_name }}</td>
            <td>
                {{-- <form action="{{ route('suppliers.destroy',$suppliers->id) }}" method="POST"> --}}
   
                    {{-- {{-- <a class="btn btn-sm btn-info" href="{{ route('suppliers.show',$suppliers->id) }}"><i class="fa-solid fa-eye"></i> show</a> --}}
    
                    {{-- <a class="btn btn-sm btn-warning" href="{{ route('suppliers.edit',$suppliers->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> --}}

                    <center><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$users->id}}"><i class="fa-solid fa-trash-can"></i></button></center>
            </td>
               <!-- delete Modal-->
               <div class="modal fade" id="deleteModal{{$users->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Are you sure you want to delete "{{$users->name}}?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            
                            <form action="{{ route('userlist.destroy',$users->id) }} " method="POST" >
                                @csrf
                                @method('DELETE')
                      
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
        </tr>
        @endif
        @endforeach
    </table>
  
    {!! $user->links('pagination::bootstrap-5') !!}
                    </div>
            </div>
        </div>
    </div>
</div>

    <style>
        .dashboard{
            padding-left: 50px; 
        }

    

        .button-box{
            display:flex;
        }
        .container{
            padding-top: 15px;
        }

    
        .card-header{
            display: flex;
       
        }
    
       .generatereport1{
        margin-left: 500px;
        
       }
        
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var navItems = document.querySelectorAll('.nav-item');

        // Set the specific page routes you want to be considered active
        var specificPageRoutes = [
            "{{ route('register') }}",
            "{{ route('forgotpass') }}",
            "{{ route('userlist') }}"
        ];

        navItems.forEach(function(navItem) {
            var collapseItems = navItem.querySelectorAll('.collapse-item');
            var isParentActive = false;

            collapseItems.forEach(function(collapseItem) {
                if (specificPageRoutes.includes(collapseItem.getAttribute('href'))) {
                    isParentActive = true;
                }
            });

            if (isParentActive) {
                navItem.classList.add('active');
            }
        });
    });
</script>
      
@endsection