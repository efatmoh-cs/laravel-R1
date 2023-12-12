<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Traits\Common;

class PlaceController extends Controller
{use Common;
    private $columns=['title','description','from','from1','image'] ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::get();
        return view('showexploer', compact('places'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $places = Place::get();
        return view('placelist', compact('places'));
       // return view('addplace');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {


        $messages= $this->messages();


        $data = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'from'=>'required|numeric|min:0|max:50',
            'from1'=>'required|numeric|min:0|max:50',
            'image' =>'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages,);

        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;

        place::create($data);

        return  redirect('showexploer');
      // return 'done';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Place::where('id', $id)->delete();
        return redirect('showexploer');
    }
    public function messages(){
        return [
            'title.required'=>'Title is required',
            'description.required'=> 'should be text',
        ];
    }
    public function exploer(){
        $places = Place::latest()
        ->orderBY('created_at','desc')
        ->take(6)
        ->get();
        return view('showexploer',compact('places'));
    }
}
