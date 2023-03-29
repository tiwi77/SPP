<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>{{$title}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <link rel="stylesheet" href="{{asset('css/singin.css')}}">
  </head>
  <body class="text-center">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center col-md-12">
                <div class="card" style="width: 20rem;">
                    <div class="card border-0 shadow rounded text-center">
                        <div class="card-body">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                        <hr class="my-4">
                            <form class="form-signin" action="actionlogin" method="POST" class="row">
                                @csrf
                                <input type="username" id="Username" class="form-control" placeholder="Username anda..." name="username" required autofocus autocomplete="off">
                                <input type="password" id="Password" name="password" class="form-control mt-3" placeholder="Password anda..." required>
                                <hr class="my-4">
                                <button class="btn btn-outline-info btn-block" type="submit">Sign in</button>
                                <a href="/logout" class="btn btn-outline-danger btn-block"><i class="bi bi-google"></i> Login With Google</a>
                                <hr class="my-3">
                            </form>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
  </body>
</html>
