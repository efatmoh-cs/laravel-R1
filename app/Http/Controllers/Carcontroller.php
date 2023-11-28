<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class Carcontroller extends Controller
{
    private $columns=['cartitle','desciption'] ;

    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $cars = new Car();
       $cars->cartitle = $request->cartitle;
      // $cars->price = $request->price;
       $cars->desciption = $request->desciption;

      // $cars->published = true;

if(isset($request->published)){
    $cars->published=true;
}else{
    $cars->published=false;
}

$cars->save();
        return 'Added Successfully';
        }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cars = car::findOrFail($id);
      return view('show', compact('cars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      //  return "the car is".$id;
      $cars = car::findOrFail($id);
      return view('updatecar', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        car::where('id', $id)->update($request->only($this->columns));
return ('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //$cars = car::findOrFail($id);
        //return view('deletecar');
        car::where('id', $id)->delete();
        return 'Delete page';
    }
}
