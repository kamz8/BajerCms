<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\EditEventRequest;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, Event $event){
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        return \response()->json($event->getEvents($startDate,$endDate));
    }

    public function myEvents($userId){
         $event = Event::whereHas('user', function ($query) use ($userId){
             $query->whereUserId($userId);
         })->get();

        return \response()->json($event);
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
     * @param CreateEventRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateEventRequest $request){
        $user = User::find(auth()->user()->id);
        $event =  new Event();
            $event->title = "Rezerwacja ".$user->firstname.' '.$user->lastname;
            $event->description = $request->description;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->save();
            $event->user()->attach($user->id);
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
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditEventRequest  $request
     * @param  int  $id
     * @uses \App\Event
     * @return \Illuminate\Http\Response
     */
    public function update(EditEventRequest $request, $id){

        $event = Event::find($id);
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->accepted = $request->accepted;
        $event->save();
        return response()->json([
            'message' => 'Event updated.',
            'data' => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Event::destroy($id);
        return response()->json([
            'message' => 'Event deleted.',
            'deleted' => $deleted,
        ],204);
    }

    public function restore($id){
        $restore = Event::withTrashed()
            ->where('id', $id)
            ->restore();
        return response()->json([
            'message' => 'Event restored.',
            'restore' => $restore,
        ]);
    }
}
