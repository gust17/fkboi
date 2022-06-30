@extends('padrao.padrao')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Editar Usuario</h1>
    <a href="{{ route('usuario.index') }}" class="btn btn-warning">Voltar</a>
    <br><br>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header">
                Dados do Usuario
            </div>

            <div class="card-body">
                <form action="{{ route('usuario.update',$usuario) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="name" value="{{$usuario->name}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{$usuario->email}}" class="form-control">
                    </div>
                    <input type="hidden" name="user_id" value="{{$usuario->id}}">
                    <div class="form-group">
                        <label for="">CPF</label>
                        <input type="text" name="cpf" value="{{$usuario->cpf}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">RG</label>
                        <input type="text" name="rg" value="{{$usuario->rg}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Expedidor</label>
                        <input type="text" name="expedidor" value="{{$usuario->expedidor}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" name="telefone" value="{{$usuario->telefone}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nascimento</label>
                        <input id="nascimento"  placeholder="Data de Nascimento" class="form-control" type="date"
                             name="nascimento"
                            value="{{$usuario->nascimento}}" required autocomplete="nascimento" />
                    </div>
                    <div class="form-group">
                        <label for="">Tipo Usuario</label>
                        <select class="form-control" name="tipo" id="">

                            <option @if ($usuario->tipo == 0)
                                selected
                            @endif value="0">Cliente</option>
                            <option @if ($usuario->tipo == 1)
                                selected
                            @endif
                            value="1">Administrador</option>
                            <option @if ($usuario->tipo == 2)
                                selected
                            @endif value="2">Vendedor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Cadastrar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection
