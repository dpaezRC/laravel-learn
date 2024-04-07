<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NoteController extends Controller
{
    public function index(): View
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function show($id): View
    {
        $note = Note::findOrFail($id);
        return view('note.show', compact('note'));
    }

    public function store(NoteRequest $request): RedirectResponse
    {
        try {
            $newNote = [
                'title' => $request->title,
                'description' => $request->description
            ];
            Note::create($newNote);

            return redirect()->route('note.index')->with('success', 'Note created!');
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return redirect()->route('note.index')->with('error', $message);
        }
    }

    public function update(NoteRequest $request, int $id): RedirectResponse
    {
        try {
            $note = Note::findOrFail($id);
            $note->update($request->all());

            return redirect()->route('note.index')->with('success', 'Note updated!');
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return redirect()->route('note.index')->with('error', $message);
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $note = Note::findOrFail($id);
            $note->delete();

            return redirect()->route('note.index')->with('success', 'Note deleted!');
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return redirect()->route('note.index')->with('error', $message);
        }
    }
}
