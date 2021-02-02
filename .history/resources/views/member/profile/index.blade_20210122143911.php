@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h3>Profile</h3> </div>
            <div class="card-body">

                <h5 class="card-title">{{ $user->name }}</h5> <br>
                <p class="card-text"><strong>Email :</strong> {{ $user -> email }}</p>
                <p class="card-text"><strong>Credits :</strong></p>

                <a href="{{ route('member.profile.edit', $user->id) }}"><button class="btn btn-primary">EDIT PERSONAL INFO</button></a>


            </div>
        </div>
    </div>
</div>

@endsection