<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{


    public function clientes()
    {
        $clientes = Auth::user()->indicacaos;

        return view('vendedor.cliente',compact('clientes'));
    }
}
