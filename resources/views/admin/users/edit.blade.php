@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{ $user->name }}</div>

                <div class="card-body">

                    <form action=" {{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method("PUT")

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="" value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <strong>Role</strong>
                        @foreach($roles as $role)

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}">
                            <label>{{ $role->name }}</label>
                        </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection