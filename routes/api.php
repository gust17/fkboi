<?php

use App\Models\Produto;
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

Route::get('datavalores/{id}/valor/{valor}', function ($id, $valor) {

    $hoje = Carbon::now();

    switch ($id) {
        case 1:
            $futuro = $hoje->addMonth(12)->format('d/m/y');
            $rendimento = $valor + ($valor * 0.12);
            return ['data' => $futuro, 'rendimento' => $rendimento];
            break;
        case 2:
            $futuro = $hoje->addMonth(24)->format('d/m/y');
            $rendimento = $valor + ($valor * 0.13 * 2);
            return ['data' => $futuro, 'rendimento' => $rendimento];
            break;
        case 3:
            $futuro = $hoje->addMonth(48)->format('d/m/y');
            $rendimento = $valor + ($valor * 0.14 * 4);
            return ['data' => $futuro, 'rendimento' => $rendimento];
            break;
    }
});
Route::get('buscaval/{id}/valor/{valor}/modalidade/{modalidade}', function ($id, $valor, $modalidade) {

    $hoje = Carbon::now();
    $agora = Carbon::now();

    if ($modalidade == 1) {
        switch ($id) {
            case 1:
                $futuro = $hoje->addMonth(1)->format('d/m/y');
                $rendimento = ($valor * 0.0095);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data' => $futuro, 'rendimento' => $rendimento, 'mensagem' => 'Seu resgate mensal será', 'tipo' => 'Primeiro Resgate', 'inicial' => $agora->format('d/m/Y'), 'porcentagem' => 'Taxa de rendimento 0,95% ao mês para o periodo de 12 meses'];
                break;
            case 2:
                $futuro = $hoje->addMonth(1)->format('d/m/y');
                $rendimento = ($valor * 0.0102);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data' => $futuro, 'rendimento' => $rendimento, 'mensagem' => 'Seu resgate mensal será', 'tipo' => 'Primeiro Resgate', 'inicial' => $agora->format('d/m/Y'), 'porcentagem' => 'Taxa de rendimento 1,02% ao mês para o periodo de 24 meses'];
                break;
            case 3:
                $futuro = $hoje->addMonth(1)->format('d/m/y');
                $rendimento = ($valor * 0.011);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data' => $futuro, 'rendimento' => $rendimento, 'mensagem' => 'Seu resgate mensal será', 'tipo' => 'Primeiro Resgate', 'inicial' => $agora->format('d/m/Y'), 'porcentagem' => 'Taxa de rendimento 1,10% ao mês para o periodo de 48 meses'];
                break;
        }
    } else {
        switch ($id) {
            case 1:
                $futuro = $hoje->addMonth(12)->format('d/m/y');
                $rendimento = $valor + ($valor * 0.12);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data' => $futuro, 'rendimento' => $rendimento, 'mensagem' => 'Valor Final', 'tipo' => 'Resgate do Investimento', 'inicial' => $agora->format('d/m/Y'), 'porcentagem' => 'Taxa de rendimento 12% ao ano para o periodo de 12 meses'];
                break;
            case 2:
                $futuro = $hoje->addMonth(24)->format('d/m/y');
                $rendimento = $valor + ($valor * 0.13 * 2);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data' => $futuro, 'rendimento' => $rendimento, 'mensagem' => 'Valor Final', 'tipo' => 'Resgate do Investimento', 'inicial' => $agora->format('d/m/Y'), 'porcentagem' => 'Taxa de rendimento 13% ao ano para o periodo de 24 meses'];
                break;
            case 3:
                $futuro = $hoje->addMonth(48)->format('d/m/y');
                $rendimento = $valor + ($valor * 0.14 * 4);
                $rendimento = number_format($rendimento, 2, '.', '');
                return ['data' => $futuro, 'rendimento' => $rendimento, 'mensagem' => 'Valor Final', 'tipo' => 'Resgate do Investimento', 'inicial' => $agora->format('d/m/Y'), 'porcentagem' => 'Taxa de rendimento 14% ao ano para o periodo de 48 meses'];
                break;
        }
    }
});

Route::post('file-upload/frente', function (Request $request) {

    //dd($request->all());

    $rules = array(
        'img' => 'required|mimes:jpeg,jpg,png,pdf|max:32760'
    );

    $error = Validator::make($request->all(), $rules);

    if ($error->fails()) {
        return response()->json(['errors' => $error->errors()->all()]);
    }



    $file = $request->file('img');
    // ou
    $file = $request->img;
    $nameFile = "";
    if ($request->hasFile('img') && $request->file('img')->isValid()) {

        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = uniqid(date('HisYmd'));
        //    dd($name);

        // Recupera a extensão do arquivo
        $extension = $request->img->extension();

        // dd($extension);

        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";

        // Faz o upload:
        $upload = $request->img->storeAs('produtos', $nameFile,'s3');
        // return $nameFile;
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
        $produto = Produto::find($request['produto_id']);
        $produto->fill(['img' => $nameFile]);
        $produto->save();
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if (!$upload) {
            return ('error' . ' Falha ao fazer upload');
        }
    };
    //  return ($busca);
    /* if (count($busca) > 0) {
        $image->move(public_path('arquivos'), $new_name);
        $salvar =  $busca->first();
        $salvar->fill(['verso' => $new_name]);
        $salvar->save();
        //dd($cliente->doc);
        ///  $cliente->doc->fill(['frente' => $new_name]);


        // $cliente->doc->save();
    } else {

        $image->move(public_path('arquivos'), $new_name);
        // return 'oi';
        $grava = [
            'user_id' => $request->cliente_id,
            'frente' => $new_name,
            'doc_id' => $request->doc_id
        ];

        //  return $grava;

        $anexo = Anexo::create($grava);
    }

    $output = array(
        'success' => 'Image uploaded successfully',
        'image' => '<img src="/images/' . $new_name . '" class="img-thumbnail" />'
    ); */
    $output = array(
        'success' => 'Image uploaded successfully',
        'image' => '<img src="/produtos/' . $nameFile . '" class="img-thumbnail" />'
    );
    return $output;

    // $grava = ['custom' => $request['name'], 'name' => $new_name, 'protocolo_id' => $request['protocolo_id']];
});


Route::post('file-upload/comprovante', function (Request $request) {

    //dd($request->all());

    $rules = array(
        'img' => 'required|mimes:jpeg,jpg,png,pdf|max:32760'
    );

    $error = Validator::make($request->all(), $rules);

    if ($error->fails()) {
        return response()->json(['errors' => $error->errors()->all()]);
    }



    $file = $request->file('img');
    // ou
    $file = $request->img;
    $nameFile = "";
    if ($request->hasFile('img') && $request->file('img')->isValid()) {

        // Define um aleatório para o arquivo baseado no timestamps atual
        $name = uniqid(date('HisYmd'));
        //    dd($name);

        // Recupera a extensão do arquivo
        $extension = $request->img->extension();

        // dd($extension);

        // Define finalmente o nome
        $nameFile = "{$name}.{$extension}";

        // Faz o upload:
        $upload = $request->img->storeAs('comprovante', $nameFile,'s3');

        //$path = \Illuminate\Support\Facades\Storage::disk('s3')->put('comprovantes', $request->img);
        //$path = \Illuminate\Support\Facades\Storage::disk('s3')->url($path);

        //dd($path);
        // return $nameFile;
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
        $produto = \App\Models\Investimento::find($request['investimento_id']);
        $produto->fill(['img' => $nameFile]);
        $produto->save();
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if (!$upload) {
            return ('error' . ' Falha ao fazer upload');
        }
    };
    //  return ($busca);
    /* if (count($busca) > 0) {
        $image->move(public_path('arquivos'), $new_name);
        $salvar =  $busca->first();
        $salvar->fill(['verso' => $new_name]);
        $salvar->save();
        //dd($cliente->doc);
        ///  $cliente->doc->fill(['frente' => $new_name]);


        // $cliente->doc->save();
    } else {

        $image->move(public_path('arquivos'), $new_name);
        // return 'oi';
        $grava = [
            'user_id' => $request->cliente_id,
            'frente' => $new_name,
            'doc_id' => $request->doc_id
        ];

        //  return $grava;

        $anexo = Anexo::create($grava);
    }

    $output = array(
        'success' => 'Image uploaded successfully',
        'image' => '<img src="/images/' . $new_name . '" class="img-thumbnail" />'
    ); */
    $output = array(
        'success' => 'Image uploaded successfully',
        'image' => '<img src="/produtos/' . $nameFile . '" class="img-thumbnail" />'
    );
    return $output;

    // $grava = ['custom' => $request['name'], 'name' => $new_name, 'protocolo_id' => $request['protocolo_id']];
});
