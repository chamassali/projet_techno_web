<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Game;
use App\Mail\CheckUser;
use App\User;
use Carbon\Carbon;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Game $game)
    {
        return view('member.cart.index')->with('game', $game);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->game_id;
        });


        if ($duplicate->isNotEmpty()) {
            return redirect()->route('home')->with('success', 'Votre article a déjà été ajouté');
        }

        $game = Game::find($request->game_id);

        Cart::add($game->id, $game->name, 1, $game->price)
            ->associate('App\Game');

        return redirect()->route('home')->with('success', 'Produit ajouté au panier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Votre article a bien été supprimé');
    }

}
