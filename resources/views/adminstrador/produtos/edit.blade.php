@extends('padrao.padrao')

@section('content')
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Modal Header</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('api/file-upload/frente') }}" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="Frente">Imagem</label>
                        <input class="form-control" type="file" name="img" id="file" />

                        <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                    </div>

                    <div class="col-md-4">
                        <input type="submit" name="upload" value="Upload" class="btn btn-success" />
                    </div>
                    <div class="col-md-12">
                        <small id="file-help" class="form-text text-muted" tabindex="0">
                            <strong>Imagem da foto</strong> <br>
                            Tamanho máximo de cada anexo: 5MB.
                        </small>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0"
                                aria-valuemax="100" style="width: 0%">
                                0%
                            </div>
                        </div>


                        <br />
                        <div id="success"></div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
    <h1 class="h3 mb-2 text-gray-800">Editar Produto</h1>
    <a href="{{ route('produto.index') }}" class="btn btn-warning">Voltar</a>
    <br><br>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Dados do Produto
            </div>

            <div class="card-body">
                <form action="{{ route('produto.update',$produto) }}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name="name" value="{{ $produto->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tempo (Meses)</label>
                        <input type="number" name="meses" value="{{ $produto->meses }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ordem</label>
                        <input type="number" name="ordem" value="{{ $produto->ordem }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Taxa Mês</label>
                        <input name="taxa_mes" type="text" value="{{ $produto->taxa_mes }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Taxa Ano</label>
                        <input value="{{ $produto->taxa_ano }}" name="taxa_ano" type="text" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="">Descriçao</label>
                        <textarea name="descricao" id="" class="form-control" cols="30" rows="10">{{ $produto->descricao }}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Salvar</button>
                    </div>
                </form>
                <div class="form-group">
                    <button data-toggle="modal" data-target="#myModal" style="background-color: #00ff75; color:black"
                        class="btn btn-default">Cadastrar Imagem</button>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
@endsection
