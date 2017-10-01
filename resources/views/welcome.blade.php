@extends('layouts.app')

@section('content')
    <div class="container" id="room">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body welcomePanelBody">
                        <div class="container inline">
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-circle btn-lg openMakeRoomModal"
                                            data-target="#makeRoomModal"
                                            data-toggle="modal">
                                        Make a Room
                                    </button>
                                </div>
                                <div class="col-md-5">
                                    <div class="text-center" style="padding-top:15px">
                                        @if (session('status'))
                                            <div class="alert alert-danger">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <img id="welcomePage-logo" src="{{asset('images/logo1.png')}}"/>
                                        <h1 style="color:white">
                                            <b>Up Your Study Game!</b>
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-success btn-circle btn-lg openJoinRoomModal"
                                            data-target="#joinRoomModal"
                                            data-toggle="modal">
                                        Join a Room
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- make a room modal -->
    <div class="modal fade openMakeRoom" id="makeRoomModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="openMakeRoomLabel">
                        <b>Make a Room</b>
                    </h3>
                </div>
                <div class="modal-body">
                    <form class="text-center" method="POST" action="{{ url('room') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="">
                                <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="">
                                <input id="password" type="password" placeholder="Password" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <!-- TODO need to populate with categories or something here -->
                        <select id="categories">
                            <option value="none">Categories</option>
                            <option value="saab">HTML</option>
                            <option value="CSS">CSS</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="jQuery">jQuery</option>
                            <option value="AJAX">AJAX</option>
                            <option value="Laravel">Laravel</option>
                            <option value="React">React</option>
                        </select>
                        <br><br>
                        <button type="button" id="closeMakeRoomBtn" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary pull-right">Create Room</button>
                    </form>
                </div>
                <br><br>
            </div>
        </div>
    </div>

    <!-- join a room modal -->
    <div class="modal fade joinMakeRoom" id="joinRoomModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="joinRoomLabel">
                        <b>Join a Room</b>
                    </h3>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('join')}}">
                        {{csrf_field()}}
                        <div class="content text-center">
                            <input id="roomCode" name="roomCodeName" type="text" placeholder="Room Code" />
                            <br><br>
                            <input id="roomTitle" name="playerName" type="text" placeholder="Name" />
                            <br><br>
                        </div>
                        <button type="button" id="closeJoinRoomBtn" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" id="joinRoomBtn" class="btn btn-success text-center pull-right">Join Room</button>
                    </form>
                </div>
                <br><br>
            </div>
        </div>
    </div>
@endsection
