@extends('layouts.layout')

@section('content')


<div class="card text-center">
    <div class="card-header">
        {{ $game->name }}
    </div>
    <div class="card-body">
        <div class="col-md-8" style="margin: auto" >
            <div class="card mb-3" style="max-width: 540px">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img
                      src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg"
                      alt="..."
                      class="img-fluid"
                    />
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><strong>Name :</strong> {{ $game->name }}</h5>
                      <p class="card-text"><strong>Platform :</strong> {{ $game->platform }}</p>
                      <p class="card-text"><strong>Price :</strong> {{ $game->price }}</p>
                      <p class="card-text"><strong>Quantity :</strong> {{ $game->quantity }}</p>
                      <p class="card-text"><strong>Activation code :</strong> {{ $game->activationCode }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <p class="card-text"> <strong>Description :</strong>{{ $game->description }}</p>
            </div>
            

    </div>
    <div class="card-footer text-muted">
        <div style="display: flex; margin: auto">
            <a href="{{ route('admin.games.edit', $game->id) }}"><button class="btn btn-primary">EDIT</button></a>
            <a href="{{route('admin.games.show', $game->id)}}"><button class="btn btn-warning">Show</button></a>
            <form action="{{ route('admin.games.destroy', $game) }}" method="POST" style="margin-left: 10px;">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            
        </div>
    </div>
  </div>
@endsection