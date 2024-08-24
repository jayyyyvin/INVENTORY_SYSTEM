{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-image: url('{{ asset('img/bg-01.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
</style>
</head>
<body>
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa-solid fa-user-group"></i> Login</h4>
                </div>
                <div class="card-body">
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form class="" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="" autofocus required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <style>
.card-header {
    background: linear-gradient(to right, #fff 20%, #ffffff 40%, #8cec94 50%, #8ceccf 55%, #ffffff 70%, #fff 100%);
  background-size: 200% auto;
  
  animation: shine 3s linear infinite;  
}
.card-body1 {
  
  background: linear-gradient(to right, #fff 20%, #ffffff 40%, #8cec94 50%, #8ceccf 55%, #ffffff 70%, #fff 100%);
  background-size: 200% auto;
  
  animation: shine 3s linear infinite;
}



@keyframes shine {
    to {
      background-position: 200% center;
    }
  }




    </style>
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-image: url('{{ asset('img/bg-01.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

</head>
<body>

<form class="" action="{{ route('login') }}" method="POST">
    @csrf

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            
                <div class="card-body p-5 text-center">
                    @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                  <h3 class="mb-5">Sign in</h3>
      
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" autofocus />
                    <label class="form-label" for="typeEmailX-2">Email</label>
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg"/>
                    <label class="form-label" for="typePasswordX-2">Password</label>
                  </div>
      
                
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</form>

<style>

    .card-body{
    
    }

    .form-control{
      background-color: #d6d9db;
    }

    .card-body{
      color: white;
      background-color: rgba(0,0,0,0.5);
      border-radius: 10%;
        border:1px solid;
        /* width:470px;
        height:440px;
        margin-top:50px;
        margin-left:420px; */
        /* background-color:darkslategray; */
        box-shadow: rgba(0, 0, 0, 0.35) 0px -50px 36px -28px inset;
        --border-size: 3px;
  --border-angle: 0turn;

  background-image: conic-gradient(from var(--border-angle), #213, #112 50%, #213), conic-gradient(from var(--border-angle), transparent 20%, #08f, rgb(0, 255, 26));
  background-size: calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)), cover;
  background-position: center center;
  background-repeat: no-repeat;
  -webkit-animation: bg-spin 3s linear infinite;
          animation: bg-spin 3s linear infinite;
}


@-webkit-keyframes bg-spin {
  to {
    --border-angle: 1turn;
  }
}
@keyframes bg-spin {
  to {
    --border-angle: 1turn;
  }

  
}
  .card-body:hover {
  -webkit-animation-play-state: paused;
          animation-play-state: paused;
}

@property --border-angle {
  syntax: "<angle>";
  inherits: true;
  initial-value: 0turn;
}
</style>
</body>
</html>