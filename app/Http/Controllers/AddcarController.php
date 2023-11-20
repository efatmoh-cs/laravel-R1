<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AddcarController extends Controller
{
    public function create(){
        return view('addcar');
        }
        public function store(Request $request){
           Post:: create([
            'title' =>$request->title,
            'price' =>$request->price,
           // 'desciption'=>$request->description,
           ]);
return back();
            }

}
