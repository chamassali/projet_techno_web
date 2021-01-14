@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.games.update', $game) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $game->name }}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Platform</label>
            <select class="form-select" name="platform">
                <option selected>{{ $game->platform }}</option>
                <option value="Pc">Pc</option>
                <option value="Xbox">Xbox</option>
                <option value="Ps4">Ps4</option>
                <option value="Ps5">Ps5</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input value="{{ $game->description }}" type="text" name="description" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input value="{{ $game->quantity }}" type="number" name="quantity" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input value="{{ $game->price }}" type="number" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label for="gameImage" class="form-label">Game image</label>
            <input class="form-control" type="file" name="gameImage" id="gameImage">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Activation code</label>
            <input  value="{{ $game->activationCode }}" type="text" name="activationCode" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection