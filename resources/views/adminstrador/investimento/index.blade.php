@extends('padrao.padrao')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Investimentos</h1>

    <br><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Lista de Investimentos
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Prazo</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($investimentos as $investimento)
                    <tr>
                        <td>{{ $investimento->user->name }}</td>
                        <td>{{$investimento->produto->name}}</td>
                        <td>{{$investimento->tipo_formatted}}</td>
                        <td>{{$investimento->produto->meses}}</td>
                        <td>{{$investimento->status_formatted}}</td>
                        <td>

                    </tr>
                @empty
                    <p>Sem Registros</p>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
