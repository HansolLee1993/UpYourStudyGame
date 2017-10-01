@extends('layouts.app')

@section('content')
    <div class="container" id="room">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h1><b>Welcome!</b></h1>
                            <br>
                            <form class="col-md-12" method="POST">
                                <div class="content text-center">
                                    <a href="{{url('room')}}" id="makeRoomCode" name="makeRoomCodeName" class="btn btn-primary">Make a Room</a>
                                    <br><br>
                                    OR
                                    <br><br>
                                    <input id="roomCode" name="roomCodeName" type="text" placeholder="Room Code" />
                                    <br><br>
                                    <input id="roomTitle" name="roomTitleName" type="text" placeholder="Name" />
                                    <br><br>
                                    <button onClick="" id="joinRoom" name="joinRoomName" class="btn btn-success">Join Room</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
