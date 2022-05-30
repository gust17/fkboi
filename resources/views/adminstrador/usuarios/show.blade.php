@extends('padrao.padrao')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Visualizar Usuario</h1>
    <a href="{{ route('usuario.index') }}" class="btn btn-warning">Voltar</a>
    <br><br>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header">
                Dados do Usuário
            </div>

            <div class="card-body">


                <div class="form-group">
                    <label for="">Nome</label>
                    <p>{{ $usuario->name }}</p>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <p>{{ $usuario->email }}</p>
                </div>
                <div class="form-group">
                    <label for="">CPF</label>
                    <p>{{ $usuario->cpf }}</p>
                </div>
                <div class="form-group">
                    <label for="">RG</label>
                    <p>{{ $usuario->rg }}</p>
                </div>
                <div class="form-group">
                    <label for="">Telefone</label>
                    <p>{{ $usuario->telefone }}</p>
                </div>
                <div class="form-group">
                    <label for="">Nascimento</label>
                    <p>{{ $usuario->nascimento_formated }}</p>
                </div>


            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection
