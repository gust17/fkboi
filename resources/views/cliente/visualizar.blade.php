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
    <div class="container border" style="border-color: #00FF75">
        <div style="background-color: black" class="card">

            <div style="" class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <center>
                    <strong>
                        <h2 style="color: #00FF75;font-size:45px;font-weight: bold;">Invista {{ $produto->name }}</h2>
                    </strong>
                </center>
                <br>

                <form action="{{ url('invistanow') }}" method="POST">
                    @csrf
                    <center>
                        <div class="row justify-content-center">
                            <div class="col-xs-4">
                                <button class="btn  btn-lg cor" onclick="diminui()">-</button>
                            </div>
                            <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                            <div class="col-xs-4">
                                <input
                                    style="color: #00FF75;text-align: center;background-color: black;border-color: #00FF75"
                                    class="form-control input-lg" name="valor" type="text" id="valor" value="100000">
                            </div>
                            <div class="col-xs-4 text">
                                <button class="btn cor btn-lg cor" onclick="aumenta()">+</button>
                            </div>
                        </div>

                    </center>



                    <br>
                    <div class="row justify-content-center">
                        <p style="color: white">Selecione a modalidade</p>

                    </div>

                    <div class="form-group">
                        <center>
                            <a class="btn cor btn-lg"> <input type="radio" id="css" name="modalidade" value="1">CUPOM</a>
                            <a class="btn cor btn-lg"> <input type="radio" id="css" name="modalidade" value="2">BULLET</a>
                        </center>
                    </div>
                    <br>

                    <br>
                    <div class="tab-content text-center">




                        <p id="porcentagem" style="font-size: 19px;color:white"></p>




                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h4>Início do Investimento</h4>
                            <p>{{ $now->format('d/m/y') }}</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4 id="primeiro"></h4>
                            <p id="futuro"></p>
                        </div>
                        <div class="col-md-12 text-center">
                            <h4 id="mensagem"></h4>
                            <p id="rendimento"></p>
                        </div>
                    </div>
                    <div class="row">
                        <a onclick="buscavalor()" class="btn cor btn-lg btn-block">Simule Agora</a>
                        <button class="btn cor btn-lg btn-block">Invista</button>
                    </div>
                </form>

            </div>
        </div>






    </div>
@endsection
@section('js')
    <script>
        function aumenta() {

            valor = $('#valor').val();
            novovalor = parseFloat(valor) + parseFloat(5000);
            busca = document.getElementById("valor");
            document.getElementById("valor").value = novovalor;
            //alert(novovalor);


        }

        function diminui() {

            valor = $('#valor').val();
            novovalor = parseFloat(valor) - parseFloat(5000);
            busca = document.getElementById("valor");
            document.getElementById("valor").value = novovalor;
            //alert(novovalor);


        }

        function buscaresultado(tipo) {
            valor = $('#valor').val();
            //alert(tipo);
            $.get("api/datavalores/" + tipo + "/valor/" + valor, function(resultado) {
                var datas = resultado;
                futuro = datas.data;
                rendimento = datas.rendimento;

                $('#futuro').html(futuro)
                $('#rendimento').html('R$ ' + rendimento + ',00')
                // alert(futuro);


                // chart.data.labels = nomes;
                // chart.data.datasets[0].data = insc; // or you can iterate for multiple datasets
                // or you can iterate for multiple datasets
                //   chart.update(); // finally update our chart
            });


        }

        function buscavalor() {
            valor = $('#valor').val();
            modalidade = $("input[type=radio][name=modalidade]:checked").val();
            meses = $("input[type=radio][name=meses]:checked").val();
            // alert(modalidade);
            $.get("{{ url('api/buscaval') }}" + "/" + {{ $produto->id }} + "/valor/" + valor + "/modalidade/" +
                modalidade,
                function(
                    resultado) {
                    var datas = resultado;
                    futuro = datas.data;
                    rendimento = datas.rendimento;
                    mensagem = datas.mensagem
                    tipo = datas.tipo
                    porcentagem = datas.porcentagem

                    $('#futuro').html(futuro)
                    $('#rendimento').html('R$ ' + rendimento)
                    $('#mensagem').html(mensagem);
                    $('#primeiro').html(tipo);
                    $('#porcentagem').html(porcentagem);

                    // alert(futuro);


                    // chart.data.labels = nomes;
                    // chart.data.datasets[0].data = insc; // or you can iterate for multiple datasets
                    // or you can iterate for multiple datasets
                    //   chart.update(); // finally update our chart
                });


        }
    </script>
@endsection
