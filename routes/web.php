<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
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
// Route::get('/todos', [TodoController::class, 'index']);
// Route::get('/todos/create', [TodoController::class, 'create']);
// Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);

// Route::post('/todos', [TodoController::class, 'store']);
// Route::put('/todos/{todo}', [TodoController::class, 'update']);
// Route::delete('todos/{todo}', [TodoController::class, 'destroy']);

Route::resource('/todos', TodoController::class);
Route::post('/todos/{todo}/completed', [TodoController::class, 'completed']);
Route::post('/todos/{todo}/notcompleted', [TodoController::class, 'notcompleted']);
