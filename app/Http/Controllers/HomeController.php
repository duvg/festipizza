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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($miip = '0')
    {

        //dd(\request()->ip());
        // find all restaurants

        $ids = Vote::where('ip', '=', $miip)->pluck('restaurant_id');
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

    public function vote(Request $request)
    {
        //dd($request->all());
        if($request->star == null)
        {
            return redirect()->back()->with('error', 'Debes seleccioanar almenos una estrella en una pizza');
        }

        if($request->star > 5)
        {
            return redirect()->back()->with('error', 'Puntaje invalido');
        }
        $vote = new Vote();
        $vote->restaurant_id = $request->id;
        $vote->ip = $request->miip();
        $vote->star = $request->star;
        $vote->save();
        return redirect()->to('/thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function results()
    {
        $restaurants = Restaurant::with('votes')->get();
        dd($restaurants);

        return view('results', compact('restaurants'));
    }
}
