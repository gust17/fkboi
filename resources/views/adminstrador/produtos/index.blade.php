@extends('padrao.padrao')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Produtos</h1>
    <a href="{{ url('admin/produto/create') }}" class="btn btn-primary">Adicionar Produto</a>
    <br><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Lista de Produtos
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Ação</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->name }}</td>
                            <td>
                                <a href="{{ route('produto.edit', $produto) }}" class="btn btn-warning"> <i
                                        class="fa fa-pen"></i></a>

                                        <a href="{{ route('produto.show', $produto) }}" class="btn btn-primary"> <i
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
