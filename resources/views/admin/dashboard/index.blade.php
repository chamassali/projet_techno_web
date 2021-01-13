@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Nombre de membres : <strong>{{ $userCount }}</strong></li>
                        <li class="list-group-item">Nombre de jeux : <strong>{{ $gameCount }}</strong></li>
                        <li class="list-group-item">Nombre de ventes : </li>
                        <li class="list-group-item">Nombre de nouvelles ventes sur les 7 derniers jours : </li>
                        <li class="list-group-item">Les revenus du site totaux : </li>
                        <li class="list-group-item">Les revenus du site sur les 7 derniers jours : </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection