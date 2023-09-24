<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PostsController::class,'index']);
Route::post('/',  [PostsController::class,'valid']);

Route::resource('/posts', 'PostsController');
Route::post('/custom',  [PostsController::class,'sendCustomMessage']);
Route::get('/posts/send', [PostsController::class, 'sendCustomMessage'])->name('posts.send');
Route::post('/custom', 'PostsController@sendCustomMessage');
Route::get('/ip', [PostsController::class, 'ip'])->name('posts.ip');
Route::get('/signal', [PostsController::class, 'signal'])->name('posts.signal');
Route::get('/reset', [PostsController::class, 'reset'])->name('posts.reset');
