<?php

namespace App\Http\Controllers\Member;

use App\Review;
use App\Game;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Game $game)
    {
        $id_game = $request->input('id_game');
        return view('member.review.create', [
            'id_game' => $id_game
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $note = $request->input('note');
        $description = $request->input('description');
        $game_id = $request->input('id_game');
        $auteur = $user = auth()->user()->name;

        $review = new Review;
        $review->description = $description;
        $review->note = $note;
        $review->id_game = $game_id;
        $review->auteur = $auteur;

        $review->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review, Game $game, Request $request)
    {
        $id_game = $request->input('id_game');
        return view('member.review.edit',['id_game' => $id_game, 'review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $note = $request->input('note');
        $description = $request->input('description');

        $review = Review::find($review->id);
        $review->note = $note;
        $review->description = $description;

        $review->save();
        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review, Game $game)
    {
        $review->delete();
        return redirect()->route('home');
    }
}
