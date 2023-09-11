<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('welcome');

});

 

 

Route::get ('/principal', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get ('/sobrenos', 'App\Http\Controllers\SobreNosController@principal')->name('site.sobrenos');

Route::get ('/contato', 'App\Http\Controllers\ContatoController@principal')->name('site.contato');


Route::prefix('/admin')-> group (function(){
Route::get('/clientes', function() {return 'Clientes';});
Route::get('/fornecedores', function() {return 'Fornecedores';});
Route::get('/produtos', function() {return 'produtos';});
});

 
Route::get('/dashboard', function () {

    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

 

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/admin', function(){
    return redirect()->route('site.index');
}
);

Route::fallback(function(){
    echo 'a rota não existe <a href="'.route('site.index').'"> clique aqui </a> ';
});

 

require __DIR__.'/auth.php';
