<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        // find all restaurants
        $restaurants = Vote::where('user_id', '=', Auth::id())->pluck('restaurant_id');
        $available = Restaurant::whereNotIn('id', $restaurants)->get();
        $res = Restaurant::all();
        dd($available);
        return view('home');
    }
}
