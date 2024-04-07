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

    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('note.show', compact('note'));
    }

    public function store(Request $request)
    {
        try {
            $newNote = [
                'title' => $request->title,
                'description' => $request->description
            ];

            if (!$newNote['title']) throw new Exception('Title is required.');
            if (!$newNote['description']) throw new Exception('Description is required.');

            Note::create($newNote);
            return redirect()->route('note.index');
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return view('error', compact('message'));
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $note = Note::findOrFail($id);
            $note->update($request->all());

            return redirect()->route('note.index');
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return view('error', compact('message'));
        }
    }

    public function destroy(int $id)
    {
        try {
            $note = Note::findOrFail($id);
            $note->delete();

            return redirect()->route('note.index');
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return view('error', compact('message'));
        }
    }
}
