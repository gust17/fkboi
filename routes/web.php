<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use App\Models\Produto;
use App\Models\User;
use Carbon\Carbon;
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
Route::post('invistanow',[ClienteController::class,'investir'])->middleware(['auth']);
Route::get('pagamento/{id}',[ClienteController::class,'pagamento'])->middleware(['auth']);
Route::get('meusinvestimentos',[ClienteController::class,'meusinvestimentos'])->middleware(['auth']);





require __DIR__ . '/auth.php';
