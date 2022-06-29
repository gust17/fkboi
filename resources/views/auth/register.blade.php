<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FKBOIINVEST - REGISTRAR</title>

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
            <div class="col-lg-5   bg-register-image">
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
                        <h1 style="color: #00FF75" class="h4  mb-4">Registrar sua conta</h1>
                    </div>

                    <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">


                            <input id="name" placeholder="Nome Completo" class="form-control form-control-user"
                                   type="text" name="name" value="{{ old('name') }}" required autofocus/>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">


                            <input placeholder="Email" id="email" class="form-control form-control-user"
                                   type="email" name="email" value="{{ old('email') }}" required/>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <input id="nascimento" placeholder="Data de Nascimento"
                                       class="form-control form-control-user" type="text"
                                       onfocus="(this.type='date')" onblur="(this.type='text')" name="nascimento"
                                       value="{{ old('nascimento') }}" required autocomplete="nascimento"/>
                            </div>
                            <div class="col-sm-6">
                                <input id="telefone" placeholder="Telefone" value="{{ old('telefone') }}"
                                       class="form-control form-control-user" type="text" name="telefone"
                                       required/>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <input id="rg" placeholder="RG" class="form-control form-control-user"
                                       type="text" name="rg" value="{{ old('rg') }}" required
                                       autocomplete="rg"/>
                            </div>
                            <div class="col-sm-6">
                                <input id="expedidor" placeholder="Orgão Expedidor" value="{{ old('expedidor') }}"
                                       class="form-control form-control-user" type="text" name="expedidor" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input id="cpf" placeholder="CPF" value="{{ old('cpf') }}"
                                       class="form-control form-control-user" type="text" name="cpf" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <input id="password" placeholder="Senha" class="form-control form-control-user"
                                       type="password" name="password" required autocomplete="new-password"/>
                            </div>
                            <div class="col-sm-6">
                                <input id="password_confirmation" placeholder="Confirme sua Senha"
                                       class="form-control form-control-user" type="password"
                                       name="password_confirmation" required/>
                            </div>
                        </div>
                        <button style="background-color: #00ff75" class="btn btn-primary btn-user btn-block">
                            {{ __('Registrar') }}
                        </button>


                    </form>

                    <hr>
                    <div class="text-center">
                        <a style="color: #00FF75" class="small" href="{{ route('password.request') }}">Esqueceu sua
                            senha?</a>
                    </div>
                    <div class="text-center">
                        <a style="color: #00FF75" class="small" href="{{ route('login') }}">
                            já tem uma conta? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
