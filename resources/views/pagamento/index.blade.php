@extends('padrao.padrao')
@section('css')
    <style>
        p {
            color: white;
            font-weight: bold;
        }

        h4 {
            color: white;
            font-weight: bold;
        }

        .cor {
            background-color: #00FF75;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    @if(isset($investimento->img))
        <div class="modal fade" id="comprovante" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 style="color: black" class="modal-title">PIX</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <img width="80%" src="{{url('storage/comprovante',$investimento->img)}}" alt="">


                    </div>
                    <button class="btn cor btn-lg btn-block" data-toggle="modal" data-target="#myModal">Alterar Comprovante</button>
                    <br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    @endif
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 style="color: black" class="modal-title">PIX</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        {!! QrCode::size(300)->generate('00020126550014BR.GOV.BCB.PIX0133administrativo@fkboiinvest.com.br5204000053039865802BR5915FAZENDA FK LTDA6009SAO.PAULO62070503***6304E745') !!}


                    </div>
                    <div class="row">

                        <div class="container">
                            PIX:
                            <input id="chavepix" class="form-control" type="text"
                                   value="00020126550014BR.GOV.BCB.PIX0133administrativo@fkboiinvest.com.br5204000053039865802BR5915FAZENDA FK LTDA6009SAO.PAULO62070503***6304E745">
                            <button class="btn cor btn-lg btn-block" onclick="myFunction()">Copiar Chave</button>

                        </div>
                    </div>

                    <br>
                    <div class="row justify-content-center">
                        <p style="color: black">Anexar Comprovante</p>
                        <form method="post" action="{{ url('api/file-upload/comprovante') }}"
                              enctype="multipart/form-data">
                            <div class="col-md-12">

                                <input type="file" name="img" id="file" />
                                <input name="investimento_id" type="hidden" value="{{$investimento->id}}">
                            </div>

                            <div class="col-md-12">
                                <input type="submit" name="upload" value="Upload"
                                       class="btn cor btn-lg btn-block" />
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 0%">
                                    0%
                                </div>
                            </div>
                        </form>




                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-body">

            @if(!isset($investimento->img))
                <button class="btn cor btn-lg btn-block" data-toggle="modal" data-target="#myModal">PIX</button>
            @else
                <button class="btn cor btn-lg btn-block" data-toggle="modal" data-target="#comprovante">Visualizar Comprovante</button>
            @endif

            <button class="btn cor btn-lg btn-block">BOLETO</button>
        </div>
    </div>
@endsection


@section('js')
    <script>
        function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("chavepix");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            //alert("Copied the text: " + copyText.value);
        }
    </script>

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
