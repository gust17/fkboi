<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestimentoRequest;
use App\Http\Requests\ProdutoRequest;
use App\Models\Conta;
use App\Models\Investimento;
use App\Models\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    public function cadConta(Request $request)
    {
        // dd($request->all());
        $request["user_id"] = Auth::user()->id;

        Conta::create($request->all());

        return redirect(url('minhaconta'));
    }
    public function visualizar($id)
    {
        $now = Carbon::now();
        $produto = Produto::find($id);

        return view('cliente.visualizar', compact('produto', 'now'));
    }

    public function investir(InvestimentoRequest $request)
    {
        //dd($request->all());
        $request['user_id'] = Auth::user()->id;
        $investimento =  Investimento::create($request->all());
        return redirect(url('pagamento', $investimento->id));
    }

    public function pagamento($id)
    {
        $investimento = Investimento::find($id);
        return view('pagamento.index',compact('investimento'));
    }
    public function meusinvestimentos()
    {
        return view('usuario.meusinvestimentos');
    }
}
