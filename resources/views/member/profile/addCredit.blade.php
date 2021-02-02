@extends('layouts.layout')

@section('content')
<div class="container">
    <form action=" {{ route('member.profile.updateCredit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Credits</label>
            <input type="number" name="credits" class="form-control" value="{{ auth()->user()->credits }}">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection