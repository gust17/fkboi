<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('datavalores/{id}/valor/{valor}', function ($id,$valor) {

    $hoje = Carbon::now();

    switch ($id) {
        case 1:
            $futuro = $hoje->addMonth(12)->format('d/m/y');
            $rendimento = $valor+($valor*0.12);
            return ['data'=>$futuro,'rendimento'=>$rendimento];
            break;
        case 2:
            $futuro = $hoje->addMonth(24)->format('d/m/y');
            $rendimento = $valor+($valor*0.13*2);
            return ['data'=>$futuro,'rendimento'=>$rendimento];
            break;
        case 3:
            $futuro = $hoje->addMonth(48)->format('d/m/y');
            $rendimento = $valor+($valor*0.14*4);
            return ['data'=>$futuro,'rendimento'=>$rendimento];
            break;
    }
});
Route::get('buscaval/{id}/valor/{valor}/modalidade/{modalidade}', function ($id,$valor,$modalidade) {

    $hoje = Carbon::now();
    $agora= Carbon::now();

    if($modalidade == 1){
        switch ($id) {
            case 1:
                $futuro = $hoje->addMonth(1)->format('d/m/y');
                $rendimento = ($valor*0.0095);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data'=>$futuro,'rendimento'=>$rendimento,'mensagem'=>'Seu resgate mensal será','tipo'=>'Primeiro Resgate','inicial'=>$agora->format('d/m/Y'),'porcentagem'=>'Taxa de rendimento 0,95% ao mês para o periodo de 12 meses'];
                break;
            case 2:
                $futuro = $hoje->addMonth(1)->format('d/m/y');
                $rendimento = ($valor*0.0102);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data'=>$futuro,'rendimento'=>$rendimento,'mensagem'=>'Seu resgate mensal será','tipo'=>'Primeiro Resgate','inicial'=>$agora->format('d/m/Y'),'porcentagem'=>'Taxa de rendimento 1,02% ao mês para o periodo de 24 meses'];
                break;
            case 3:
                $futuro = $hoje->addMonth(1)->format('d/m/y');
                $rendimento = ($valor*0.011);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data'=>$futuro,'rendimento'=>$rendimento,'mensagem'=>'Seu resgate mensal será','tipo'=>'Primeiro Resgate','inicial'=>$agora->format('d/m/Y'),'porcentagem'=>'Taxa de rendimento 1,10% ao mês para o periodo de 48 meses'];
                break;
        }

    }else{
        switch ($id) {
            case 1:
                $futuro = $hoje->addMonth(12)->format('d/m/y');
                $rendimento = $valor+($valor*0.12);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data'=>$futuro,'rendimento'=>$rendimento,'mensagem'=>'Valor Final','tipo'=>'Resgate do Investimento','inicial'=>$agora->format('d/m/Y'),'porcentagem'=>'Taxa de rendimento 12% ao ano para o periodo de 12 meses'];
                break;
            case 2:
                $futuro = $hoje->addMonth(24)->format('d/m/y');
                $rendimento = $valor+($valor*0.13*2);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data'=>$futuro,'rendimento'=>$rendimento,'mensagem'=>'Valor Final','tipo'=>'Resgate do Investimento','inicial'=>$agora->format('d/m/Y'),'porcentagem'=>'Taxa de rendimento 13% ao ano para o periodo de 24 meses'];
                break;
            case 3:
                $futuro = $hoje->addMonth(48)->format('d/m/y');
                $rendimento = $valor+($valor*0.14*4);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data'=>$futuro,'rendimento'=>$rendimento,'mensagem'=>'Valor Final','tipo'=>'Resgate do Investimento','inicial'=>$agora->format('d/m/Y'),'porcentagem'=>'Taxa de rendimento 14% ao ano para o periodo de 48 meses'];
                break;
        }
    }


});

