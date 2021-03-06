@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header">Games list</div>
            <div class="card-body">
                <a href="{{ route('admin.games.create') }}"><button type="button" class="btn btn-dark">Add a game</button></a>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($games as $game)
                    <div class="col" style="margin-top: 35px;">
                        <div class="card" style="width: 18rem;">
                            <img style="height: 150px;" src="{{ asset('storage/gameImage/' . $game->gameImage) }}" class="card-img-top" alt="{{$game->gameImage}}">
                            <div class="card-body">
                                <h5 class="card-title"><strong>Name :</strong> {{ $game->name }}</h5>
                                {{-- <p class="card-text"><strong>Description :</strong> {{ $game->description }}</p>
                                <p class="card-text"><strong>Platform :</strong> {{ $game->platform }}</p>
                                <p class="card-text"><strong>Price :</strong> {{ $game->price }}</p>
                                <p class="card-text"><strong>Quantity :</strong> {{ $game->quantity }}</p>
                                <p class="card-text"><strong>Activation code :</strong> {{ $game->activationCode }}</p>
                                <div style="display: flex;">
                                    <a href="{{ route('admin.games.edit', $game->id) }}"><button class="btn btn-primary">EDIT</button></a>
                                    <form action="{{ route('admin.games.destroy', $game) }}" method="POST" style="margin-left: 10px;">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
</div>

@endsection