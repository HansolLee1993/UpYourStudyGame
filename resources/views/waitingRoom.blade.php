@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Waiting Room</h1>
        <hr>
    </div>
    <div class="container" id="room">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container">
                            <div class="row">
                                @if(isset($players))
                                    @foreach($players as $player)
                                        <div class="col-md-2">
                                            <img id={{"player-".$player->id}} class="waitingRoom-avatar" src="{{asset('avatars/smiley_face.png')}}">
                                            <br>
                                            <span>
                                                Name: {{$player->name}}
                                            </span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-2">
                                        <span>No players :(</span>
                                    </div>
                                @endif
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
                                Room: {{$game->room()->first()->code}}
                                <!-- TODO room variable can go here -->
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
                                    {{$game->room()->first()->code}}
                                </span>
                                &nbsp;to join the game
                            </p>
                            <!-- TODO logic to show button or not for host -->
                            <button class="btn btn-lg btn-success">Start</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
