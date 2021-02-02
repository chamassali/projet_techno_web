@extends('layouts.layout')

@section('content')

<div class="container">

  <div class="row">

    <div class="col-lg-3">
      <h1 class="my-4">Shop Name</h1>
      <div class="list-group">
      </div>
    </div>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div class="card mt-4">
        <img style="height: 400px;" class="card-img-top img-fluid" src="{{ asset('storage/gameImage/' . $game->gameImage) }}" alt="">
        <div class="card-body">
          <h3 class="card-title">{{ $game->name }}</h3>
          <h4>{{ $game->price }}.00 €</h4>
          <p class="card-text"><strong>Description : </strong> {{ $game->description }}</p>
          @if (Auth::check())
          <form action="{{ route('member.cart.store') }}" method="POST">
            @csrf
            <input type="hidden" name="game_id" value="{{ $game->id }}">
            <button type="submit" class="btn btn-success">Add to cart</button>
          </form>

          @else
          <a href="{{ route('login') }}">
            <button type="button" class="btn btn-success">Add to cart</button>
          </a>
          @endif
        </div>
      </div>
      <!-- /.card -->

      <div class="card card-outline-secondary my-4">
        <div class="card-header">
          Product Reviews 
          <strong style="float: right;">Average score : {{ $reviewAverage }}/10</strong>

        </div>
        <div class="card-body">
          @foreach($game->reviews as $review)

          <h3>{{ $review->note }}/10</h3>
          <p>{{ $review->description }}</p>
          <small class="text-muted">Posted by {{ $review->auteur }} on {{ $review->created_at }}
            @if (Auth::check())
              @if($review->auteur === auth()->user()->name)
              <div style="display: flex;">
                <a class="btn" href="{{ route('member.review.edit',['id_game'=>$game->id, $review ]) }}"><i class="fa fa-edit"></i></a>
                <form action=" {{ route('member.review.destroy', $review) }}" method="POST" style="margin-left: 10px;">
                  @csrf
                  @method("DELETE")
                  <button class="btn"><i class="fa fa-trash"></i></button>
                </form>
              </div>
              @endif
            @endif

          </small>
          <hr>
          @endforeach
          <a href=" {{ route('member.review.create', ['id_game'=>$game->id]) }} " class="btn btn-success">Leave a Review</a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->

</div>
<!-- /.col-lg-9 -->

</div>

</div>

@endsection