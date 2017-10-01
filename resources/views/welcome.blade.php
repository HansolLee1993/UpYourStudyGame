@extends('layouts.app')

@section('content')
    <div class="container" id="room">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            @if (session('status'))
                                <div class="alert alert-danger">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h1><b>Welcome!</b></h1>
                            <br>
                            <form class="col-md-12" method="POST" action="{{url('join')}}">
                                {{csrf_field()}}
                                <div class="content text-center">
                                    <a href="{{url('room')}}" id="makeRoomCode" class="btn btn-primary">Make a Room</a>
                                    <br><br>
                                    OR
                                    <br><br>
                                    <input id="roomCode" name="roomCodeName" type="text" placeholder="Room Code" />
                                    <br><br>
                                    <input id="roomTitle" name="playerName" type="text" placeholder="Name" />
                                    <br><br>
                                    <button type="submit" id="joinRoomBtn" class="btn btn-success">Join Room</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
