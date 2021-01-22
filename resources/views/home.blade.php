@extends('layouts.layout')


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

@section('content')

<div class="container">

    <div class="row">
        @foreach($games as $game)
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                <a href="{{route('admin.games.show', $game->id)}}"><img style="height: 200px;" class="card-img-top" src="{{ asset('storage/gameImage/' . $game->gameImage) }}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <h5 class="card-title" href="#"><strong>Name :</strong> {{ $game->name }}</h5>
                    </h4>
                    <p class="card-text"><strong>Platform :</strong> {{ $game->platform }}</p>
                    <p class="card-text"><strong>Price :</strong> {{ $game->price }}.00€</p>
                    <button type="button" class="btn btn-success">Acheter</button>
                    {{--<a href="{{route('admin.games.show', $game->id)}}"><button class="btn btn-warning">Show</button></a>--}}

                </div>
                </div>
            </div>
        @endforeach  
      
    </div>
</div>

@endsection