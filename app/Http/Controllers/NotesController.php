<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\CreateNoteRequest;
use App\Note;
use App\User;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::with('user','event')->get();
        return response()->json($notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNoteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNoteRequest $request)
    {
        $user = User::find($request->user_id);
        $event = Event::find($request->event_id);
        $note = new Note();
        $note->note = $request->note;
        $note->save();
        $note->user()->attach($user->id);
        $note->event()->attach($event->id);

        return response()->json($event,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::with('user','event')->findOrFail($id);
        return response()->json($note);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    @TODO add edited by user_id
    public function update(CreateNoteRequest $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->note = $request->note;
        $note->save();
        return response()->json($note, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Note::destroy($id);
        return response()->json([
            'message' => 'Event deleted.',
            'deleted' => $deleted,
        ],204);
    }
}
