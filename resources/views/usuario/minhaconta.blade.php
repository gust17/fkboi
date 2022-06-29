@extends('padrao.padrao')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <br><br>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"> Minha Conta</h5>
            </div>
            <div class="card-body">


                <div class="form-group">
                    <label for="">Nome:</label>
                    <label for="">{{ Auth::user()->name }}</label>
                </div>
                <div class="form-group">
                    <label for="">CPF/CNPJ:</label>
                    <label for="">{{ Auth::user()->cpf }}</label>
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <label for="">{{ Auth::user()->email }}</label>
                </div>
                <div class="form-group">
                    <label for="">Telefone:</label>
                    <label for="">{{ Auth::user()->telefone }}</label>
                </div>


            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Minha Conta</h3>
                <div class="card-tools pull-right">

                </div>
            </div>

        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Dados Complementares</h3>

            </div>
            <div class="card-body">
                <form action="{{ url('complementar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Estado Civil:</label>
                        <select class="form-control" name="estado_civil" id="">
                            <option value="1">SOLTEIRO</option>
                            <option value="2">CASADO</option>
                            <option value="3">DIVORCIADO</option>
                            <option value="4">VIUVO</option>
                        </select>

                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="">PROFISSÃO</label>
                        <input type="text"
                            @if (Auth::user()->complementar) value="{{ Auth::user()->complementar->profissao }}" @endif
                            class="form-control" name="profissao">
                    </div>
                    <div class="form-group">
                        <button style="background-color: #00ff75;color:black" class="btn btn-block">
                            Cadastrar
                        </button>
                    </div>
                </form>


            </div>
        </div>
        <br>


        <div class="card collapsed-box">
            <div class="card-header">
                <h3 class="box-title"> Endereço</h3>

            </div>
            <div class="card-body">

                <form action="{{ url('endereco') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label for="cep" class="col-sm-2 control-label">CEP</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                @if (Auth::user()->endereco) value="{{ Auth::user()->endereco->cep }}" @endif
                                name="cep" id="cep" placeholder="cep">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="endereco" class="col-sm-2 control-label">Endereço</label>

                        <div class="col-sm-10">
                            <input type="text" name="endereco"
                                @if (Auth::user()->endereco) value="{{ Auth::user()->endereco->endereco }}" @endif
                                class="form-control" id="endereco">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endereco" class="col-sm-2 control-label">Bairro</label>

                        <div class="col-sm-10">
                            <input type="text" name="bairro"
                                @if (Auth::user()->endereco) value="{{ Auth::user()->endereco->bairro->name }}" @endif
                                class="form-control" id="bairro">
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="endereco" class="col-sm-2 control-label">Cidade</label>

                        <div class="col-sm-10">
                            <input type="text" name="cidade"
                                @if (Auth::user()->endereco) value="{{ Auth::user()->endereco->cidade->name }}" @endif
                                class="form-control" id="cidade">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="uf" class="col-sm-2 control-label">UF</label>

                        <div class="col-sm-10">
                            <input type="text" name="uf"
                                @if (Auth::user()->endereco) value="{{ Auth::user()->endereco->estado->name }}" @endif
                                class="form-control" id="uf">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="n" class="col-sm-2 control-label">N</label>

                        <div class="col-sm-10">
                            <input type="text" name="n"
                                @if (Auth::user()->endereco) value="{{ Auth::user()->endereco->n }}" @endif
                                class="form-control" id="n">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="complemento" class="col-sm-2 control-label">Complemento</label>

                        <div class="col-sm-10">
                            <input type="text" name="complemento"
                                @if (Auth::user()->endereco) value="{{ Auth::user()->endereco->complemento }}" @endif
                                class="form-control" id="complemento">
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">
                            <button class="btn btn-primary btn-block">Cadastrar</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>




        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Dados Bancarios</h3>

            </div>
            <div class="card-body">


                <form action="{{ url('cadconta') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Selecione um Banco</label>
                        <select class="form-control js-example-basic-single" name="banco_id" id="cmbPais">
                            <option value=""></option>
                        </select>
                    </div>
                    <input type="hidden" name="name" id="banco">
                    <div class="form-group">
                        <label for="">Cod Banco</label>
                        <input type="text" id="code" name="code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Agencia com digito</label>
                        <input type="text" id="agencia" name="agencia" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Conta com digito</label>
                        <input type="text" id="conta" name="conta" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tipo Chave</label>

                        <select class="form-control" name="tipo_chave" id="">
                            <option value="1">CPF</option>
                            <option value="2">EMAIL</option>
                            <option value="3">CELULAR</option>
                            <option value="4">CHAVE ALEATORIA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Chave Pix</label>
                        <input class="form-control" type="text" name="pix" id="">
                    </div>
                    <div class="form-group">
                        <button style="background-color: #00ff75;color:black" class="btn btn-block">
                            Cadastrar
                        </button>
                    </div>

                </form>
                <br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Banco</th>
                            <th>Codigo</th>
                            <th>Agencia</th>
                            <th>Conta</th>
                            <th>Chave Pix</th>
                            <th>Pix</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(Auth::user()->contas as $conta)
                            <tr>
                                <td>{{ $conta->name }}</td>
                                <td>{{ $conta->code }}</td>
                                <td>{{ $conta->agencia }}</td>
                                <td>{{ $conta->conta }}</td>
                                <td>{{ $conta->tipo_chave }}</td>
                                <td>{{ $conta->pix }}</td>

                            </tr>

                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <br>




    </div>
@endsection



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2();
            $.ajax({
                type: 'GET',
                url: 'https://brasilapi.com.br/api/banks/v1',

                success: function(dados) {

                    if (dados.length > 0) {
                        var option = '<option>Selecione seu banco</option>';
                        $.each(dados, function(i, obj) {
                            option += '<option value="' + obj.code + '">' + obj.name +
                                '</option>';
                        })
                        $('#mensagem').html('<span class="mensagem">Total de paises encontrados.: ' +
                            dados.length + '</span>');
                        $('#cmbPais').html(option).show();
                    } else {
                        Reset();
                        $('#mensagem').html(
                            '<span class="mensagem">Não foram encontrados paises!</span>');
                    }
                }
            });
            $("#cmbPais").change(function() {

                var valor = document.getElementById('cmbPais').value;

                //  alert(valor);
                // alert(valor);
                $.ajax({
                    type: 'GET',
                    url: 'https://brasilapi.com.br/api/banks/v1/' + valor,

                    success: function(data) {
                        // alert(data.code);
                        $('input[name="code"]').val(data.code);
                        $('#banco').val(data.name);
                    }
                });
            });

            $("#cep").change(function() {

                var valor = document.getElementById('cep').value;

                // alert(valor);
                $.ajax({
                    type: 'GET',
                    url: 'https://viacep.com.br/ws/' + valor + '/json/',

                    success: function(data) {
                        var names = data.bairro
                        $('input[name="endereco"]').val(data.logradouro);
                        $('input[name="bairro"]').val(data.bairro);
                        $('input[name="cidade"]').val(data.localidade);
                        $('input[name="uf"]').val(data.uf);
                        //alert(names);
                        // $('#cand').html(data);
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
@endsection
