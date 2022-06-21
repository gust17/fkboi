@extends('padrao.padrao')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{$produto->name}}</h1>
    <a href="{{ route('produto.index') }}" class="btn btn-warning">Voltar</a>
    <br><br>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <img width="250px" class="img-fluid" src="{{ url("storage/produtos/$produto->img") }}" alt="">
            </div>
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
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(document).ready(function() {

            $('form').ajaxForm({
                beforeSend: function() {
                    $('#success').empty();
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    $('.progress-bar').text(percentComplete + '%');
                    $('.progress-bar').css('width', percentComplete + '%');
                },
                success: function(data) {
                    if (data.errors) {
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                        $('#success').html('<span class="text-danger"><b>' + data.errors +
                            '</b></span>');
                    }
                    if (data.success) {
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                        $('#success').html('<span class="text-success"><b>' + data.success +
                            '</b></span><br /><br />');
                        $('#success').append(data.image);

                        location.reload();
                    }
                }
            });

        });
    </script>
@endsection
