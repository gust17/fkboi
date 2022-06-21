@extends('padrao.padrao')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Prazo</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (Auth::user()->investimentos as $investimento)
                            <tr>
                                <td>{{$investimento->produto->name}}</td>
                                <td>{{$investimento->tipo_formatted}}</td>
                                <td>john@example.com</td>
                                <td>john@example.com</td>
                                <td></td>
                            </tr>
                        @empty
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
