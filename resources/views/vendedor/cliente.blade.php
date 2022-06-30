@extends('padrao.padrao')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Investimento Ativo</th>
                <th>Investimento Inativo</th>
                <th>Data de Cadastro</th>
            </tr>
            </thead>
            <tbody>

            @forelse(Auth::user()->indicacaos as $indicacao)
            <tr>
                <td>{{$indicacao->name}}</td>
                <td>{{count($indicacao->investimentos->where('status',1))}}</td>
                <td>{{count($indicacao->investimentos->where('status',0))}}</td>
                <td>{{$indicacao->created_at->format('d/m/Y')}}</td>
            </tr>
            @empty


            @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection
