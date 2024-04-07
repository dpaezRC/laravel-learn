<?php

namespace App\Router;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

class NoteRouter
{
    public static function routes()
    {
        Route::view('/store', 'note.store')->name('note.create');
        Route::post('/', [NoteController::class, 'store'])->name('note.store');
        Route::put('/{id}', [NoteController::class, 'update'])->name('note.update');
        Route::get('/{id}', [NoteController::class, 'show'])->name('note.show');
    }
}
