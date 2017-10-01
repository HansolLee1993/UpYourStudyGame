@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ $player->name }}</h1>
        <hr>
        @if($host->id == $player->id)
            <div>
                <span>Everyone ready?</span>
            </div>
            <button>Start game</button>
        @endif
    </div>
@endsection