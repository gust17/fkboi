<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestimentoRequest;
use App\Http\Requests\ProdutoRequest;
use App\Models\Conta;
use App\Models\Investimento;
use App\Models\Produto;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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

    public function indicacao(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'rg' => ['required'],
            'cpf' => ['required', 'cpf','unique:users'],
            'telefone' => ['required'],
            'nascimento' => ['required', 'date']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rg' => $request->rg,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'nascimento' => $request->nascimento,
            'link' => md5($request->cpf),
            'expedidor'=>$request->expedidor,
            'quem' => $request->quem
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
