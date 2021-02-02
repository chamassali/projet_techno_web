@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('member..store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Note</label>
            <select class="form-select" name="note">
                <option selected>0</option>
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
            <input type="text" name="description" class="form-control">
        </div>

        <input type="hidden" name="id_game" value="{{ $id_game }}"><br><br>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection