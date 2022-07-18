<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::where('tipo','!=',0)->get();
        $tipo = "Sistema";
        return view('adminstrador.usuarios.index', compact('usuarios','tipo'));
    }
    public function cliente()
    {
        $usuarios = User::where('tipo',0)->get();
        $tipo = "Cliente";
        return view('adminstrador.usuarios.index', compact('usuarios','tipo'));
    }
    public function create()
    {
        return view('adminstrador.usuarios.create');
    }

    public function store(UsuarioRequest $request)
    {
        $request['link'] = md5($request->cpf);
        $request['password'] = Hash::make($request->cpf);
        User::create($request->all());


        return redirect()->route('usuario.index');
    }

    public function edit(User $usuario)
    {
        return view('adminstrador.usuarios.edit', compact('usuario'));
    }
    public function show(User $usuario)
    {
        return view('adminstrador.usuarios.show', compact('usuario'));
    }
    public function update(Request $request)
    {

        $user = User::find($request->user_id);

        dd($user);
        $user->fill($request->all());
        $user->save();
        return redirect()->route('usuario.index');

    }


}
