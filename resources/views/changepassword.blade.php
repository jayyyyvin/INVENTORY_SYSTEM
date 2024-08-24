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
                    <form action="{{ route('changepassword',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="oldpassword" class="form-label">Old Password:</label>
                            <input id="oldpassword" type="password" class="form-control" name="oldpassword" value="" placeholder="old password" required>
                        </div>
                        <div class="mb-3">
                            <label for="newpassword" class="form-label">New Password:</label>
                            <input type="password" name="newpassword" class="form-control" id="newpassword"  value="" placeholder="new password" required>

                        </div>
                        <div class="mb-3">
                            <label for="confirmpass" class="form-label">Confirm New Password:</label>
                            <input type="password" name="confirmpass" class="form-control" id="confirmpass" value="" placeholder="confirm password"  required>
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

    
</body>
</html>
@endsection