<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Http\Controllers\Controller;
use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('admin.games.index')->with('games', $games); //salam
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('gameImage')) {
            $fileNameWithExt = $request->file('gameImage')->getClientOriginalName();
        };

        if($request->hasFile('gameImage')){
            $fileNameWithExt = $request->file('gameImage')->getClientOriginalName();   
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);     
            $extension = $request->file('gameImage')->getClientOriginalExtension();         
            $fileNameToStore = $fileName.'.'.$extension;
            $path = $request->file('gameImage')->storeAs('public/gameImage', $fileNameToStore);    //

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $name = $request->input('name');
        $description = $request->input('description');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $activationCode = $request->input('activationCode');
        $platform = $request->input('platform');


        $game = new Game();
        $game->name = $name;
        $game->description = $description;
        $game->quantity = $quantity;
        $game->price = $price;
        $game->activationCode = $activationCode;
        $game->platform = $platform;
        $game->gameImage = $fileNameToStore;

        $game->save();

        return redirect()->route('admin.games.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view ("admin.games.show")->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit')->with('game', $game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        if ($request->hasFile('gameImage')) {
            $fileNameWithExt = $request->file('gameImage')->getClientOriginalName();
        };

        if($request->hasFile('gameImage')){
            $fileNameWithExt = $request->file('gameImage')->getClientOriginalName();   
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);     
            $extension = $request->file('gameImage')->getClientOriginalExtension();         
            $fileNameToStore = $fileName.'.'.$extension;
            $path = $request->file('gameImage')->storeAs('public/gameImage', $fileNameToStore);

        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }

        $name = $request->input('name');
        $description = $request->input('description');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $activationCode = $request->input('activationCode');
        $platform = $request->input('platform');


        $game = Game::find($game->id);
        $game->name = $name;
        $game->description = $description;
        $game->quantity = $quantity;
        $game->price = $price;
        $game->activationCode = $activationCode;
        $game->platform = $platform;
        $game->gameImage = $fileNameToStore;

        if($game->save()){
            $request->session()->flash('success', $game->name . " a bien été modifié");
        }else{
            $request->session()->flash('error', "Le jeu n'a pas été modifié");
        };

        return redirect()->route('admin.games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Game $game)
    {
        $game->delete();

        if($game->delete()){
            $request->session()->flash('error', "Le jeu n'a pas été supprimé");

        }else{
            $request->session()->flash('success', $game->name . " a bien été supprimé");
        };

        return redirect()-> route('admin.games.index');
    }
}
