<?php

namespace App\Http\Controllers;

use App\Pizza;
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
        $ids = Vote::where('user_id', '=', Auth::id())->pluck('restaurant_id');
        $restaurants = Restaurant::whereNotIn('id', $ids)->get();


        return view('home', compact('restaurants'));
    }

    public function votes($id)
    {
        $vote = Vote::where('user_id', Auth::id())->where('restaurant_id', $id)->get();



        if($vote->count() == 0){
            $newVote = new Vote();
            $newVote->user_id = Auth::id();
            $newVote->restaurant_id = $id;
            $newVote->save();
            return redirect()->to('/thanks');
        } else {

            return redirect()->to('/home');
        }
    }

    public function thanks()
    {
        return view('thanks');
    }
}
