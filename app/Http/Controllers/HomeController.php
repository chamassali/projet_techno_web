<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Game;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';

        if($search != ''){
            $games = Game::where('name', 'like', '%' . $search . '%')
            ->paginate(9);
        } else {
            $games = Game::paginate(9);
        }

        return view('home')->with('games', $games);
    }
}
