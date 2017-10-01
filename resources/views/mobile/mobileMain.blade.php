@extends('layouts.mobileapp')

@section('content')
    <div class="container">
        <div id="mobile-container">
            <div class="logo-container">
                <div class="col-sm-12 text-center">
                <img src="{{URL::asset('/img/logo.png')}}" alt="logo" width="200px" height="200px">
                    <h3 >Up Your Study Game</h3>
                </div>
            </div>

            <form>
                <div class="form-group ">
                    <div class=" text-center">
                        <label for="roomno" class="control-label">Room Number</label>
                    </div>
                    <div class="col-sm-11">
                        <input id="roomno" type="text" name="roomno" class="form-control" required>

                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <label for="username" class="control-label">User Name </label>
                    </div>
                    <div class="col-sm-11">
                        <input id="username" type="text" name="username"  class="form-control" required>

                    </div>
                </div>
            </form>

            <div class="col-sm-12 row text-center">
                <button type="button" class="btn btn-default btn-circle btn-xl col-sm-4  ">Join</button>

            </div>

        </div>

    </div>
@endsection
