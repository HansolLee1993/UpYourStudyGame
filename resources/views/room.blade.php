@extends('layouts.app')

@section('content')
    <div class="container" id="room">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-danger">
                            {{ session('status') }}
                            </div>
                        @endif
                        <div class="room-content text-center">
                            <h1><b>Make a Room</b></h1>
                            <h4>User sign in and make a room</h4>


                            <form class="col-md-12 row room-form" method="POST" action="{{ url('room') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-3">
                                    <div class="">
                                        <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-3">
                                    <div class="">
                                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="dropdown col-md-4">
                                    <button class="btn btn-default dropdown-toggle form-control" type="button" data-toggle="dropdown">Categories
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="/createCategory">Create New Category</a></li>
                                        <li><a href="#">CSS</a></li>
                                        <li><a href="#">JavaScript</a></li>
                                    </ul>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            Create Room
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
