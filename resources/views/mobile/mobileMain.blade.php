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

            <div class="col-sm-12 row text-center">
                <button type="button" class="btn btn-default btn-circle btn-xl col-sm-4 col-md-offset-1 col-sm-4 ">Join</button>
                <button type="button" class="btn btn-default btn-circle btn-xl col-sm-4">Create</button>
            </div>

        </div>

    </div>
@endsection
