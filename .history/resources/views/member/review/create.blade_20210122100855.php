@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Note</label>
            <select class="form-select" name="note">
                <option selected>0</option>
                <option value="1">Pc</option>
                <option value="2">Xbox</option>
                <option value="3">Ps4</option>
                <option value="4">Ps5</option>
                <option value="5">Ps5</option>
                <option value="6">Ps5</option>
                <option value="7">Ps5</option>
                <option value="4">Ps5</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" name="description" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection