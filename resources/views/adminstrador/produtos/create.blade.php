@extends('padrao.padrao')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Cadastro de Produto</h1>
    <a href="{{ route('produto.index') }}" class="btn btn-warning">Voltar</a>
    <br><br>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Dados do Produto
            </div>

            <div class="card-body">
                <form action="{{ route('produto.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tempo (Meses)</label>
                        <input type="number" name="meses" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Taxa Mês</label>
                        <input name="taxa_mes" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ordem</label>
                        <input type="number" name="ordem" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Imagem</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                    <div class="form-group">
                        <label for="">Descriçao</label>
                        <textarea name="descricao" id="" class="form-control" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection
