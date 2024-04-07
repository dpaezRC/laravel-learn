<?php

namespace App\Http\Controllers;

class NoteController extends Controller
{
    public function index()
    {
        return view('note.index');
    }

    public function show(int $id)
    {
        return view('note.show', compact('id'));
    }
}
