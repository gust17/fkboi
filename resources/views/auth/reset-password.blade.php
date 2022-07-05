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
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<style>
    .cor{
        color: #00ff75
    }
</style>

<body style="background-color: black" class="">

<div class="container">
@include('flash-message)
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                        <h1 style="color: #00FF75" class="h4  mb-4">Resetar sua senha!</h1>
                    </div>


                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <!-- Password Reset Token -->

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="form-group">
                            <label class="cor" for="">Email</label>

                            <input id="email" class="form-control" type="email" name="email"
                                     value="{{old('email', $request->email)}}" required autofocus/>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label class="cor" for="">Nova Senha</label>

                            <input id="password" class="form-control" type="password" name="password" required/>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label class="cor" for="">Confirmação de Senha</label>

                            <input id="password_confirmation" class="form-control"
                                     type="password"
                                     name="password_confirmation" required/>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <button style="background-color: #00ff75;color: black" class="btn btn btn-user btn-block">  Resetar Senha</button>
                        </div>
                    </form>

                </div>
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
</body>
</html>
