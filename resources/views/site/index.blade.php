<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</head>
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

<body style="background-color: black;border: 1px;">

<div class="container border" style="border-color: #00FF75">
    <div style="background-color: black" class="panel">

        <div style="" class="panel-body text-center">
            <center>

                <strong>
                    <h2 style="color: #00FF75;font-size:45px;font-weight: bold;">Simulador de Investimento</h2>
                </strong>
                <br>
                <div class="row">

                    <div class="col-xs-12">

                        <div class="input-group">
                            <span
                                style="color: #00FF75;text-align: center;background-color: black;border-color: #00FF75"
                                class="input-group-addon">R$</span>
                            <input
                                style="color: #00FF75;text-align: center;background-color: black;border-color: #00FF75"
                                class="form-control input-lg" type="text" id="valor"
                                value="100000">
                            <span
                                style="color: #00FF75;text-align: center;background-color: black;border-color: #00FF75"
                                class="input-group-addon">.00</span>


                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-xs-6 text-right">
                        <button class="btn btn-block btn-lg cor"
                                onclick="diminui()">-
                        </button>
                    </div>
                    <div class="col-xs-6 text-left">
                        <button class="btn btn-block cor btn-lg cor"
                                onclick="aumenta()">+
                        </button>
                    </div>
                </div>


            </center>
            <br>


            <p style="color: white">Selecione o período de duração do Investimento</p>


            <div class="row text-center">

                <div class="row">
                    <div style="margin-bottom: 10px" class="col-md-4">
                        <button onclick="acender(1)" class="btn cor btn-lg "><input class="meses" type="radio" id="meses1" name="meses"
                                                               value="1">12 meses
                        </button>
                    </div>

                    <div style="margin-bottom: 10px" class="col-md-4">
                        <button onclick="acender(2)" class="btn cor btn-lg "><input class="meses" type="radio" id="meses2" name="meses"
                                                               value="2">24 meses
                        </button>
                    </div>

                    <div style="margin-bottom: 10px" class="col-md-4">
                        <button onclick="acender(3)" class="btn cor btn-lg "><input class="meses" type="radio" id="meses3" name="meses"
                                                               value="3">48 meses
                        </button>
                    </div>
                </div>


            </div>
            <br>
            <div class="row text-center">
                <button onclick="acendermetodo(1)" class="btn cor btn-lg"><input type="radio" id="css1" name="modalidade" value="1">CUPOM</button>
                <button onclick="acendermetodo(2)" class="btn cor btn-lg"><input type="radio" id="css2" name="modalidade" value="2">BULLET</button>
            </div>
            <br>
            <div class="row">
                <button onclick="buscavalor()" class="btn cor btn-lg btn-block">Simule Agora</button>
            </div>
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
        </div>
    </div>


</div>

</body>
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

        if (novovalor<100000){
            novovalor = 100000;
        }

        busca = document.getElementById("valor");
        document.getElementById("valor").value = novovalor;
        //alert(novovalor);


    }

    function buscaresultado(tipo) {
        valor = $('#valor').val();
        //alert(tipo);
        $.get("api/datavalores/" + tipo + "/valor/" + valor, function (resultado) {
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
        $.get("api/buscaval/" + meses + "/valor/" + valor + "/modalidade/" + modalidade, function (resultado) {
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

<script>

    function acender(id) {
        var elm = document.getElementById('meses'+id);
        //alert('oi');
        elm.checked = !elm.checked;
    }

    function acendermetodo(id) {
        var elm = document.getElementById('css'+id);

        elm.checked = !elm.checked;
    }

</script>

</html>
