@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Note</label>
            <select class="form-select" name="note">
                <option selected>Patform</option>
                <option value="Pc">Pc</option>
                <option value="Xbox">Xbox</option>
                <option value="Ps4">Ps4</option>
                <option value="Ps5">Ps5</option>
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