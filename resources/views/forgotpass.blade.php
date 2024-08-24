@extends('homelayout')

@section('content')
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa-solid fa-user-plus"></i>Change Password</h4>
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
                    <form action="{{ route('forgotpass') }}" method="POST">
                        @csrf
                        <div class="mb-3"><br>
                            <label for="email" class="form-label">Select Email: </label>
                            {{-- <input type="text" name="role_id" class="form-control" id="role_id" placeholder="" required> --}}
                        <select name="email">
                            @foreach($user as $rol)
                            <option value="{{$rol->email}}">{{$rol->email}}</option>
                            @endforeach

                       </select>
                        </div>
               
                        <div class="mb-3"><br>
                            <label for="password" class="form-label">New Password:</label>
                            <input type="text" name="newpassword" class="form-control" value="" placeholder="new password" required>
                        </div>
                     
                        <div class="mb-3">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Save</button>
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