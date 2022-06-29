<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Http\Requests\EnderecoRequest;
use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Complementar;
use App\Models\Endereco;
use App\Models\Estado;
use App\Models\Produto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return redirect(url('dashboard'));
});

Route::get('/dashboard', function () {

    $user = Auth::user();
    if ($user->tipo == 0) {
        $planos = Produto::all();
        return view('cliente.dashboard', compact('planos'))->with('success', 'Task Created Successfully!');
    }
    $totalclientes = User::where('tipo', 0)->count();
    return view('usuario.index', compact('totalclientes'));
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('produto', ProdutoController::class);
    Route::resource('usuario', UserController::class);
    Route::get('produto/cadimg/{id}', [ProdutoController::class, 'cadimg'])->name('produto.cadimg');
});

Route::get('simulador', function () {
    $now = Carbon::now();
    return view('site.index', compact('now'));
});

Route::get('indicacao/{id}', [AdminController::class, 'hashagro']);
Route::get('minhaconta', [AdminController::class, 'minhaconta'])->middleware(['auth']);
Route::post('cadconta', [ClienteController::class, 'cadConta'])->middleware(['auth']);
Route::get('assinatura/{id}', [ClienteController::class, 'visualizar'])->middleware(['auth']);
Route::post('invistanow', [ClienteController::class, 'investir'])->middleware(['auth']);
Route::get('pagamento/{id}', [ClienteController::class, 'pagamento'])->middleware(['auth']);
Route::get('meusinvestimentos', [ClienteController::class, 'meusinvestimentos'])->middleware(['auth']);
Route::post('complementar', function (Request $request) {


    $user = User::find($request->user_id);
    //dd($user->complementar);

    if (isset($user->complementar)) {
        $user->complementar->fill($request->all());
        $user->complementar->save();
    } else {
        Complementar::create($request->all());
    }
    return redirect()->back();
});

Route::post('endereco', function (EnderecoRequest $request) {
    //dd($request->all());

    $user = User::find($request->user_id);

    //dd($user);


    $estado = Estado::where('name', $request->uf)->first();

    if (!isset($estado)) {
        $estado = Estado::create(['name' => $request->uf]);
    }


    $cidade = Cidade::where('name', $request->cidade)->where('estado_id', $estado->id)->first();

    if (!isset($cidade)) {
        $cidade = Cidade::create(['name' => $request->cidade, 'estado_id' => $estado->id]);
    }

    $bairro = Bairro::where('name', $request->bairro)->where('cidade_id', $cidade->id)->where('estado_id', $estado->id)->first();

    //dd($bairro);
    if (!isset($bairro)) {
        $bairro = Bairro::create(['name' => $request->bairro, 'estado_id' => $estado->id, 'cidade_id' => $cidade->id]);
    }

    if (!isset($user->endereco)) {
        Endereco::create([

            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'bairro_id' => $bairro->id,
            'cidade_id' => $cidade->id,
            'estado_id' => $estado->id,
            'complemento' => $request->complemento,
            'n' => $request->n,
            'user_id' => $request->user_id,
        ]);
    } else {
        $user->endereco->fill([

            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'bairro_id' => $bairro->id,
            'cidade_id' => $cidade->id,
            'estado_id' => $estado->id,
            'complemento' => $request->complemento,
            'n' => $request->n,
            'user_id' => $request->user_id,
        ]);

        $user->endereco->save();
    }





    return redirect()->back();

    //dd($bairro);
});





require __DIR__ . '/auth.php';
