@extends('layouts.layout')

@section('content')




<div class="container">
    @can('manage-users')
    <a href="{{ route('admin.games.create') }}"><button type="button" class="btn btn-dark">Add a game</button></a>
    @endcan
    <div class="row">
        @foreach($games as $game)
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                <a href="{{route('admin.games.show', $game->id)}}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <h5 class="card-title" href="#"><strong>Name :</strong> {{ $game->name }}</h5>
                    </h4>
                    <p class="card-text"><strong>Platform :</strong> {{ $game->platform }}</p>
                    <p class="card-text"><strong>Price :</strong> {{ $game->price }}.00€</p>
                    <button type="button" class="btn btn-success">Acheter</button>
                    {{--<a href="{{route('admin.games.show', $game->id)}}"><button class="btn btn-warning">Show</button></a>--}}
                    @can('manage-users')
                    <form action="{{ route('admin.games.destroy', $game) }}" method="POST" style="width: 75px; margin-left: 0px">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endcan
                </div>
                </div>
            </div>
        @endforeach  
      
    </div>
</div>
<br>
<br>
<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

@endsection

@section('content2')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>First Slide</h3>
            <p>This is a description for the first slide.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Second Slide</h3>
            <p>This is a description for the second slide.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third Slide</h3>
            <p>This is a description for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>
@endsection


{{-- 
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
--}}