@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{ route('member.review.update', $review) }} " method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="" class="form-label">Note</label>
            <select class="form-select" name="note">
                <option selected>{{ $review->note }}</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" value="{{ $review->description }}" name="description" class="form-control">
        </div>

        <input type="hidden" name="id_game" value="{{ $id_game }}"><br><br>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection