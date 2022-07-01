<?php

namespace App\Http\Controllers;

use App\Models\Investimento;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function listarUser()
    {
        $usuarios = User::all();

        return view('adminstrador.usuarios.index', compact('usuarios'));
    }

    public function hashagro($id)
    {
      $agroacessor = User::where('link',$id)->first();

      return view('auth.venda',compact('agroacessor'));


    }

    public function minhaconta()
    {

        return view('usuario.minhaconta');
    }


    public function investimentos()
    {
        $investimentos = Investimento::all();

        return view('adminstrador.investimento.index',compact('investimentos'));



    }
}
