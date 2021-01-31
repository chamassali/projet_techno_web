@extends('layouts.layout')

@section('content')

@if (Cart::count() > 0 )
<div class="px-4 px-lg-0">

    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Remove</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $game)
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="{{ asset('storage/gameImage/' . $game->model->gameImage) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0">{{ $game->model->name}}</h5>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>{{ $game->model->price }}.00€</strong></td>
                                    <td class="border-0 align-middle">
                                        <form action="{{ route('member.cart.destroy', $game->rowId) }}" method="POST" style="margin-left: 10px;">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>

            <div class="row py-5 p-4 bg-white rounded shadow-sm">

                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <!-- <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p> -->
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">{{ Cart::subtotal() }}€</h5>
                            </li>
                        </ul>

                        <a href="{{ route('member.cart.pdf') }}"><button type="button" class="btn btn-dark rounded-pill py-2 btn-block">Acheter</button></a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@else

<div class="container-fluid" style="margin: 100px auto;">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body cart">
                <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                    <h3><strong>Your Cart is Empty</strong></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@endsection