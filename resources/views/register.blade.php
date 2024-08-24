@extends('homelayout')

@section('content')
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa-solid fa-user-plus"></i> Add User</h4>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image:</label>
                            <input id="profile_image" type="file" class="form-control" name="profile_image" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">User Name:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="email" required>
                        </div>
                        <div class="mb-3"><br>
                            <label for="email" class="form-label">Role Name: </label>
                            {{-- <input type="text" name="role_id" class="form-control" id="role_id" placeholder="" required> --}}
                            <select name="role_name">
                            <option>Supervisor</option>
                            <option>Warehouseman</option>
                            <option>Admin</option>
                            {{-- @foreach($role as $rol)
                            <option value="{{$rol->id}}">{{$rol->role_name}}</option>
                            @endforeach --}}

                       </select>
                        </div>
                        <div class="mb-3"><br>
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



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
    
    
</body>
</html>
@endsection