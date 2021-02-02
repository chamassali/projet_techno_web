@extends('layouts.app')

@section('content')
<div class="container">
    <form action=" {{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Platform</label>
            <select class="form-select" name="platform">
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

        <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="number" name="price" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection