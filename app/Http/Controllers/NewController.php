<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("addcar");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news = new News();
      $news->title = $request->title;
      $news->auth = $request->auth;
      $news->description = $request->content;
     // $news->published = true;
      $news->save();
if(isset($request->published)){
    $news->published=true;
}else{
    $news->published=false;
}


       return 'Added Successfully';
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
    public function destroy(string $id)
    {
        //
    }
}
