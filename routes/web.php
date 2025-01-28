<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AfiliadoController;
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
    return view('ipasmetru');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('info', function () {
    return view('info');
});

Route::get('RyA', function () {
    return view('RyA');
});

Route::get('servicios', function () {
    return view('servicios');
});

Route::get('acercaDe', function () {
    return view('acercaDe');
});

Route::get('/modif1Afiliado', function () {
    return view('modif1Afiliado');
});

Route::get('agrega1Benef', function () {
    return view('agrega1Benef');
});

Route::get('act1ReqAfil', function () {
    return view('act1ReqAfil');
});

Route::get('agrega1Cred', function () {
    return view('agrega1Cred');
});

Route::get('agrega1CredH', function () {
    return view('agrega1CredH');
});

Route::get('consulAfiliado', function () {
    return view('consulAfiliado');
});

Route::get('rep1Afiliado', function () {
    return view('rep1Afiliado');
});

/*Route::post('/guardarModifA', function () {
    return view('modif2Afiliado');
});*/

Route::resource('afiliado', 'AfiliadoController');
Route::post('guardarModifA', 'AfiliadoController@guardarModifA');

Route::get('newAfiliado', function () {
    return view('newAfiliado');
});
Route::post('newAfiliado', function () {
    return view('newAfiliado');
});

Route::get('repo1Benef', function () {
    return view('repo1Benef');
});

Route::get('con1Benef', function () {
    return view('con1Benef');
});

Route::get('con1Cred', function () {
    return view('con1Cred');
});

Route::get('repo1Cred', function () {
    return view('repo1Cred');
});

Route::get('emitirCarnet1', function () {
    return view('emitirCarnet1');
});

Route::get('verRepGAfil', function () {
    return view('verRepGAfil');
});


///// RUTAS CON POST /////

Route::get('eliminaBenef', function () {
    return view('eliminaBenef');
});
Route::post('eliminaBenef', function () {
    return view('eliminaBenef');
});
Route::put('eliminaBenef', function () {
    return view('eliminaBenef');
});

Route::get('agregaDCredH', function () {
    return view('agregaDCredH');
});
Route::post('agregaDCredH', function () {
    return view('agregaDCredH');
});

Route::get('agregaDCred', function () {
    return view('agregaDCred');
});
Route::post('agregaDCred', function () {
    return view('agregaDCred');
});

Route::get('verConstAfil', function () {
    return view('verConstAfil');
});
Route::post('verConstAfil', function () {
    return view('verConstAfil');
});

Route::get('con2Cred', function () {
    return view('con2Cred');
});
Route::post('con2Cred', function () {
    return view('con2Cred');
});

Route::get('newAfiliado', function () {
    return view('newAfiliado');
});
Route::post('newAfiliado', function () {
    return view('newAfiliado');
});

Route::get('modif2Afiliado', function () {
    return view('modif2Afiliado');
});
Route::post('modif2Afiliado', function () {
    return view('modif2Afiliado');
});

Route::get('agregaDBenef', function () {
    return view('agregaDBenef');
});
Route::post('agregaDBenef', function () {
    return view('agregaDBenef');
});

Route::get('actReqAfil', function () {
    return view('actReqAfil');
});
Route::post('actReqAfil', function () {
    return view('actReqAfil');
});

Route::get('selectCred', function () {
    return view('selectCred');
});
Route::post('selectCred', function () {
    return view('selectCred');
});

Route::get('repIndAfiliado', function () {
    return view('repIndAfiliado');
});
Route::post('repIndAfiliado', function () {
    return view('repIndAfiliado');
});

Route::get('con2Benef', function () {
    return view('con2Benef');
});
Route::post('con2Benef', function () {
    return view('con2Benef');
});

// RUTAS DE CONTROLADOR

Route::get("Benef/elim",[AfiliadoController::class,'elimBenef'])->name("benef.del");

Route::post("Benef/elim",[AfiliadoController::class,'elimBenef'])->name("benef.elim");

require __DIR__.'/auth.php';
