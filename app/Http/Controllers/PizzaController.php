<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Validator;
class PizzaController extends Controller
{
	// return all records of pizzas
    public function index()
    {
    	$pizzas = Pizza::all();
    	return view('pizza.index', compact('pizzas'));
    }

    // show for  to create a pzizza
    public function create()
    {
    	return view('pizza.form');
    }


    // save a pizza
    public function store(Request $request)
    {

    	$rules = [
    		'name' => 'required',
    		'description' => 'required',
    		'ingredients' => 'required',

    	];

    	$v = Validator::make($request->all(), $rules);

    	if($v->fails()) {
    	    dd($v);
            return back()->withErrors($v);
        }

    	$data = $request->all();
        $picture = $request->file('picture');
        /*$data['picture'] = $picture->store();*/

        if ($request->hasFile('picture')) {

            $fileName = 'images/'.time().$picture->getClientOriginalName();
            $picture->move(public_path('images'), $fileName);
            $data['picture'] = $fileName;
        }

        Pizza::create($data);

        return redirect()->route('pizza.index')->with('success','Pizza creada satisfactoriamente');

    }

    // show form to edit pizza
    public function edit($id)
    {
    	$pizza = Pizza::findOrFail($id);
    	return view('pizza.form', compact('pizza'));
    }

    // save changes a pizza
    public function update(Request $request, $id)
    {

    	$pizza = Pizza::findOrFail($id);

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

    	return redirect()->route('pizza.index')->with('success','Pizza modificada satisfactoriamente');

    }

    // destroy a pizza
    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);

        Pizza::destroy($id);

        return redirect()->route('pizza.index')->with('success','Pizza eliminada satisfactoriamente');
    }

}
