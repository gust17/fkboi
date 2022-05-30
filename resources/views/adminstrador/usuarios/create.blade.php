@extends('padrao.padrao')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Cadastro de Usuario</h1>
    <a href="{{ route('usuario.index') }}" class="btn btn-warning">Voltar</a>
    <br><br>
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    Dados do Usuario
                </div>

                <div class="card-body">
                    <form action="{{ route('usuario.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">CPF</label>
                            <input type="text" name="cpf" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">RG</label>
                            <input type="text" name="rg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Telefone</label>
                            <input type="text" name="telefone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nascimento</label>
                            <input id="nascimento" placeholder="Data de Nascimento" class="form-control" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" name="nascimento"
                                value="{{ old('nascimento') }}" required autocomplete="nascimento" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Cadastrar</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
