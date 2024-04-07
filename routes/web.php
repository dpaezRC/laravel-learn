<?php

use Illuminate\Support\Facades\Route;

use App\Router\NoteRouter;
use App\Http\Controllers\NoteController;

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


Route::get('/', [NoteController::class, 'index'])->name('note.index');
Route::prefix('note')->group(fn() => NoteRouter::routes());
