@extends('padrao.padrao')
@section('css')

    <style>
        p {
            color: white;
        }

        h5 {
            color: white;
        }

        h3 {
            color: white;
        }

        i {
            color: white;
        }

        th {
            color: white;
        }

        tr {
            color: white;
        }


        .boleado {
            border-radius: 25px;
        }

        .borda {
            border: 5px solid;
            border-color: #00FF75;
            background-color: black;
            border-radius: 25px;


        }

        .fundo {
            color: white;
            background-color: transparent;
        }

        h1 {
            font-size: 35px;
        }

    </style>
@endsection
@section('content')

    @if(isset(Auth::user()->investimentos))
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Investimentos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count(Auth::user()->investimentos)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        @forelse ($planos as $plano)
            <div class="modal fade" id="myModal{{ $plano->id }}" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title">{{ $plano->name }}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            {{ $plano->descricao }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <div style="margin-top:30px" class="col- col-md-4">
                <div id="selecionado{{ $plano->id }}" class="panel borda intas">
                    <div class="panel-body outro">
                        <div class="row justify-content-center">
                            <img width="150px" class="img-fluid" src="https://arquivos.sfo3.digitaloceanspaces.com/comprovante/{{$plano->img}}"
                                 alt="">
                        </div>
                        <h1 style="color: #00FF75;font-size:25px" class="panel-title text-center">
                            {{ $plano->name }}
                        </h1>
                        <h6 style="color: white" class="descricao">


                        </h6>

                    </div>
                    <div class="panel-footer text-center fundo">

                        <h4>

                            Prazo: {{ $plano->meses }} meses


                        </h4>
                        <h3> Modalidades: </h3>
                        <h2> Cupom {{ $plano->taxa_mes }}% ao Mês</h2>
                        <h2> Bullet {{ $plano->taxa_ano }}% ao Ano</h2>
                        <div class="container">
                            <div class="form-group">
                                <a style="background-color: #00FF75" class="btn btn-lg btn-block btn-success boleado "
                                   href="{{ url('assinatura', $plano->id) }}">Invista Agora</a>
                                <a style="background-color: #00FF75" data-toggle="modal"
                                   data-target="#myModal{{ $plano->id }}"
                                   class="btn btn-lg btn-block btn-success boleado">Saiba
                                    Mais</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        @empty
        @endforelse

    </div>
@endsection
