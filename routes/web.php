<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Carbon\Carbon;

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
    return view('usuario.index');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::resource('produto', ProdutoController::class);
    Route::resource('usuario', UserController::class);

});

Route::get('simulador',function(){
    $now = Carbon::now();
    return view('site.index',compact('now'));
});

Route::get('indicacao/{id}',[AdminController::class,'hashagro']);
Route::get('minhaconta',[AdminController::class,'minhaconta']);





require __DIR__.'/auth.php';
