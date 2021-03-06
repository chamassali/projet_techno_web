@extends('layouts.app')

@section('content')

<h2>Games list</h2>
<div class="container">

    @foreach($games as $game)
    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
                <h5 class="card-title" href="#"><strong>Name :</strong> {{ $game->name }}</h5>
            </h4>
            <p class="card-text"><strong>Platform :</strong> {{ $game->platform }}</p>
            <p class="card-text"><strong>Price :</strong> {{ $game->price }}.00€</p>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
          </div>
        </div>
      </div>
    @endforeach  
      
      
      
      
    </div>
</div>

@endsection

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
                                {{-- <p class="card-text"><strong>Description :</strong> {{ $game->description }}</p> --}}
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
                                    <a href="{{route('admin.games.show', $game->id)}}"><button class="btn btn-warning">Show</button></a>
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