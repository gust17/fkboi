@extends('padrao.padrao')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Produtos</h1>
    <a href="{{ route('produto.index') }}" class="btn btn-warning">Voltar</a>
    <br><br>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Dados do Produtos
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="">Nome</label>
                <strong>
                    <p>{{ $produto->name }} </p>
                </strong>
            </div>
            <div class="form-group">
                <label for="">Tempo (Meses)</label>
                <strong>
                    <p>
                        {{ $produto->meses }}
                    </p>
                </strong>
            </div>
            <div class="form-group">
                <label for="">Taxa Mês</label>
                <strong>
                    <p>
                        {{ $produto->taxa_mes }}
                    </p>
                </strong>
            </div>
            <div class="form-group">
                <label for="">Ordem</label>
                <strong>
                    <p>
                        {{ $produto->ordem }}
                    </p>
                </strong>
            </div>

        </div>
    </div>
@endsection
