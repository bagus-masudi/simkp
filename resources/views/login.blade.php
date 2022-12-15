<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Fix style in ngrok -->
     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  
  <link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/main.css')}}">
  <title>Resepku</title>
</head>

<body>
<div class="modal-login position-fixed w-100 h-100 top-50">
    <div class="wrapper position-fixed shadow w-100 top-50 bg-light p-4 text-center">
        <h4 class="mt-1 mb-4">Login</h4>
        @if (session()->has('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
                    
        <form action="" method="POST">
        @csrf
            <div class="mb-3 text-start">
                <label  class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required/>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control"  required/>
            </div>
            <div class="d-grid pt-1 pb-1 mt-4 fs-1">
            <button class="btn text-light fs-5">Login</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>