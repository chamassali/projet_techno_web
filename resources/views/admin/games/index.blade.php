@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Games list</div>
                <div class="card-body">
                    <a href="{{ route('admin.games.create') }}"><button type="button" class="btn btn-dark">Add a game</button></a>

                    @foreach($games as $game)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $game->gameImage }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Name :</strong> {{ $game->name }}</h5>
                            <p class="card-text"><strong>Description :</strong> {{ $game->description }}</p>
                            <p class="card-text"><strong>Price :</strong> {{ $game->price }}</p>
                            <p class="card-text"><strong>Quantity :</strong> {{ $game->quantity }}</p>
                            <p class="card-text"><strong>Activation code :</strong>  {{ $game->activationCode }}</p>


                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection