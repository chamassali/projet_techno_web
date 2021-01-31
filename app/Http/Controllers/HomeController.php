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
        $this->middleware('auth');
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
            ->get();
        } else {
            $games = Game::paginate(6);
        }

        return view('home')->with('games', $games);
    }
}
