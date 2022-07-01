@extends('padrao.padrao')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Usuários</h1>
    <a href="{{ route('usuario.create') }}" class="btn btn-primary">Adicionar Usuários</a>
    <br><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Lista de Usuários {{$tipo}}
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Ação</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>
                                <a href="{{ route('usuario.edit', $usuario) }}" class="btn btn-warning"> <i
                                        class="fa fa-pen"></i></a>

                                        <a href="{{ route('usuario.show', $usuario) }}" class="btn btn-primary"> <i
                                            class="fa fa-eye"></i></a>


                                    </td>

                        </tr>
                    @empty
                        <p>Sem Registros</p>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
