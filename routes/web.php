<?php

use Illuminate\Support\Facades\Route;

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