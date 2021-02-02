@extends('layouts.layout')

@section('content')

<div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
          <div class="card-body">
            <h3 class="card-title">{{ $game->name }}</h3>
            <h4>{{ $game->price }}.00 €</h4>
            <p class="card-text">{{ $game->description }}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars

            <button type="button" class="btn btn-success">Success</button>

          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>




@endsection


{{--


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
              <p class="card-text"> <strong>Description : </strong>{{ $game->description }}</p>
            </div>
            

    </div>
    <div class="card-footer text-muted">
        <div style="margin: auto">
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
  --}}