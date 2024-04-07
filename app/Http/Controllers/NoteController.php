<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function store(Request $request)
    {
        try {
            $newNote = [
                'title' => $request->title,
                'description' => $request->description
            ];
            Note::create($newNote);
            return redirect()->route('note.index');
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return view('error', compact('message'));
        }
    }

    public function show(int $id)
    {
        return view('note.show', compact('id'));
    }
}
