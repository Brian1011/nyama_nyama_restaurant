<?php

namespace App\Http\Controllers;

use App\meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = meal::all();
        return view('meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'meal_name'=>'required',
            'meal_price'=>'required|numeric',
            'meal_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $input = $request->all();
        //deal with the image
        $image = $request->file('meal_picture');
        $new_image_name = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_image_name);
        $input['meal_picture'] = $new_image_name;
        meal::create($input);

        //return back()->with('success','Meal created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(meal $meal)
    {
        return view('meals.show', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(meal $meal)
    {
        return view('meals.edit',compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, meal $meal)
    {
        $request->validate([
            'meal_name'=>'required',
            'meal_price'=>'required|number',
            'meal_pic'=>'required'
        ]);

        meal::update($request->all());

        return back()->with('success','Meal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\meal  $meal
     * @return \Illuminate\Http\Response
     */

    public function destroy(meal $meal)
    {
        $meal->delete();
        return back()->with('success','Meal deleted successfully');
    }
}
