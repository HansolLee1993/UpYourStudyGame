@extends('layouts.app')

@section('content')
    <div class="container" id="room">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <img id="player1" class="waitingRoom-avatar" src="{{asset('avatars/smiley_face.png')}}">
                                    <br>
                                    <span>
                                        Name:
                                    </span>
                                </div>
                                <div class="col-md-2">
                                    <img id="player2" class="waitingRoom-avatar" src="{{asset('avatars/smiley_face.png')}}">
                                    <br>
                                    <span>
                                        Name:
                                    </span>
                                </div>
                                <div class="col-md-2">
                                    <img id="player3" class="waitingRoom-avatar" src="{{asset('avatars/smiley_face.png')}}">
                                    <br>
                                    <span>
                                        Name:
                                    </span>
                                </div>
                                <div class="col-md-2">
                                    <img id="player4" class="waitingRoom-avatar" src="{{asset('avatars/smiley_face.png')}}">
                                    <br>
                                    <span>
                                        Name:
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                            {{ session('status') }}
                            </div>
                        @endif
                        <div class="waitingRoom-Code text-center">
                            <span class="waitingRoom-Label">
                                Room:
                                <!-- room variable can go here -->
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>
                        </div>
                        <div class="text-center">
                            <p>Go to upyourstudygame.tech</p>
                            <p>
                                Enter your name and the room code
                                <span class="waitingRoom-Label">
                                    test
                                </span>
                                &nbsp;to join the game
                            </p>
                            <!-- logic for host or not -->
                            <button class="btn btn-lg btn-success">Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
