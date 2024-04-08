<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    public function index(): JsonResponse
    {
        $notes = Note::all();
        return response()->json($notes);
    }

    public function show($id): JsonResponse
    {
        try {

            $note = Note::find($id);
            if (!$note) throw new Exception('Note not found');
            return response()->json($note);
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return response()->json(compact('message'));
        }
    }

    public function store(NoteRequest $request): JsonResponse
    {
        try {
            $newNote = Note::create($request->all());

            return response()->json($newNote);
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return response()->json(compact('message'));
        }
    }

    public function update(NoteRequest $request, int $id): JsonResponse
    {
        try {
            $note = Note::find($id);
            if (!$note) throw new Exception('Note not found');
            $note->update($request->all());

            return response()->json($note);
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return response()->json(compact('message'));
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $note = Note::find($id);
            if (!$note) throw new Exception('Note not found');
            $note->delete();

            return response()->json($note);
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            return response()->json(compact('message'));
        }
    }
}
