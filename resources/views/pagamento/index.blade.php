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
                    <br>
                    <div class="row justify-content-center">
                        <p style="color: black">Anexar Comprovante</p>
                        <input type="file" class="form-control">
                        <br>
                        <button class="btn cor btn-lg btn-block">Enviar</button>
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
            <button class="btn cor btn-lg btn-block" data-toggle="modal" data-target="#myModal">PIX</button>
            <button class="btn cor btn-lg btn-block">BOLETO</button>
        </div>
    </div>
@endsection
