<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Room;
use App\Models\Game;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('room');
    }

    /**
     * Show the form for creating a new room.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('room');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomAllocated = Room::whereNull('user_id')->first();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            $user = User::where('email', $request->email)->first();
            $roomAllocated->user_id = $user->id;
            $roomAllocated->save();

            $game = new Game;
            $game->user_id = $roomAllocated->user_id;
            $game->room_id = $roomAllocated->id;
            $game->save();

            return redirect('game/'.$game->id);

        }
        return back()->with('status', 'Could not authenticate user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //waiting room
        //return view('waitingRoom');
    }

    /**
     * Show the form for editing the specified resource.
     *
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
