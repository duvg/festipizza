<?php

namespace App\Http\Controllers;

use Validator;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // return all records of pizzas
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurant.index', compact('restaurants'));
    }

    // show for  to create a pzizza
    public function create()
    {
        return view('restaurant.form');
    }


    // save a restaurant
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'telephone' => 'required',
        ];

        $v = Validator::make($request->all(), $rules);


        $data = $request->all();
        $picture = $request->file('picture');
        /*$data['picture'] = $picture->store();*/

        if ($request->hasFile('picture')) {

            $fileName = 'images/'.time().$picture->getClientOriginalName();
            $picture->move(public_path('images'), $fileName);
            $data['picture'] = $fileName;
        }

        Restaurant::create($data);

        return redirect()->route('restaurant.index')->with('success','Restaurnat creada satisfactoriamente');

    }

    // show form to edit restaurant
    public function edit($id)
    {
        $pizza = Restaurant::findOrFail($id);
        return view('restaurant.form', compact('restaurant'));
    }

    // save changes a restaurant
    public function update(Request $request, $id)
    {

        $pizza = Restaurant::findOrFail($id);

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
        ];

        $v = Validator::make($request->all());

        if($v->fails()) return back()->with('errors', $v->errors());

        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->ingredients = $request->ingredients;

        if(!empty($request->picture))
        {
            $pizza->picture = $request->picture->store();
        }

        $pizza->save();

        return redirect()->route('restaurant.index')->with('success','Restaurnat modificada satisfactoriamente');

    }

    // destroy a restaurant
    public function destroy($id)
    {
        $pizza = Restaurant::findOrFail($id);

        Restaurant::destroy($id);

        return redirect()->route('restaurant.index')->with('success','Restaurnat eliminada satisfactoriamente');
    }
}
