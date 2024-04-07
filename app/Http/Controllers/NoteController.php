<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Note;
use Illuminate\View\View;
use Illuminate\Http\Request;
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

    public function store(Request $request): RedirectResponse | View
    {
        try {
            $request->validate([
                'title' => 'required|max:255|min:3',
                'description' => 'required|max:255|min:3'
            ]);

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

    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            $request->validate([
                'title' => 'required|max:255|min:3',
                'description' => 'required|max:255|min:3'
            ]);

            $note = Note::findOrFail($id);
            $note->update($request->all());

            return redirect()->route('note.index');
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return view('error', compact('message'));
        }
    }

    public function destroy(int $id): RedirectResponse
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
