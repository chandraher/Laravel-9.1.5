<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
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
    return view('welcome');
});

Route::get('/mahasiswa', function () {
    return "nama : chandra";
});

//redirect
route::redirect('/unpam', '/mahasiswas');

//fallback route
route::fallback(function () {
    return "404 by test fallback";
});

//to view with route parameter
Route::view('/hello', 'hello', ['name' => 'chandra']);

//with route parameter path
Route::view('/hello-page/{name}', 'hello');

//with get request redirect hello
Route::get('/hello-again', function () {
    return view('hello', ['name' => 'chandra h']);
});

//nested
Route::view('/hello-world', 'hello.world', ['world' => 'Tangerang', 'name' => 'chandra']);

//Route::get(): Digunakan untuk halaman dinamis yang memerlukan logika, pemrosesan data, atau pengambilan data dari database sebelum menampilkan halaman.
//Route::view(): Digunakan sebagai jalan pintas (shortcut) untuk halaman statis yang sama sekali tidak memerlukan logika atau data dari database.

///////

//ROUTE PARAMETER with if else
Route::get('/hello-route/{id}', function ($id) {
    if($id == "1") {
        $id = "chandra";
    }
    return "hello " . $id;
});

Route::get('/hello-route/{product}/items/{item}', function ($product,$item) {
    return "hello " . $product . " " . $item;
});   

//route parameter with reguler expression
Route::get('/product-id/{id}', function ($id) {
    return "product id : " . $id;
})->where('id', '[0-9]+');

//optional route parameter with default value
Route::get('/product/{id?}', function (string $userId = "404") {
    return "product detail id : " . $userId;
})->name('product.detail'); 

//test route conflict
Route::get('/conflict/{name}', function (string $name) {
    return "conflict 2 : " . $name;
});

Route::get('/conflict/{name}', function (string $name) {
    return "conflict 1: " . $name;
});

Route::get('/conflict/chandra', function () {
    return "conflict chandra";
});
    
//named router
Route::get('product/{id}', function ($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

//integrasi controller
Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);
