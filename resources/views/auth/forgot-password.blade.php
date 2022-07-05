<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FKBOIINVEST - LOGIN</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: black" class="">

<div class="container">


    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 bg-register-image">
                <br>
                <br><br>
                <br><br>
                <img style="display: block;
                margin-top: auto;
  margin-left: auto;
  margin-right: auto;
  width: 100%;" class="img img-fluid" src="{{asset('logo.png')}}" alt="">
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 style="color: #00FF75" class="h4  mb-4">Esqueceu sua senha?</h1>
                    </div>

                    @include('flash-message')

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label style="color: #00ff75" for="">Email</label>

                            <input id="email" class="form-control" type="email" name="email"
                                     value="{{old('email')}}" required autofocus/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button style="background-color: #00ff75;color: black" class="btn btn btn-user btn-block">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </div>


    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
</div>
</body>

