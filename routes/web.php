<?php

use App\Http\Controllers\PostsController;
use App\Http\Livewire\Counter;
use App\Http\Livewire\News;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Product;
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

Route::get('news',News::class)->name('news');
Route::get('product',Product::class)->name('product');


Route::get('pp',[PostsController::class, 'index']);

Route::get('/detail/{id}', [PostsController::class, 'detail'])->name('detail');

//Route::get('counter', Counter::class);

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::group([
    //'prefix' => 'v1',
    'middleware' => ['auth:sanctum', 'verified']
], function () {

    Route::get('/dashboard', function (Request $request) {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/post',Posts::class)->name('post');
    Route::get('/counter',Counter::class)->name('counter');

});
