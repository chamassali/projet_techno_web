@extends('layouts.layout')

@section('content')

<div class="col-md-8">
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
          <p class="card-text"><strong>Platform :</strong> {{ $game->platform }}</p><p class="card-text">
            
          </p>
          <p class="card-text">
            
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection