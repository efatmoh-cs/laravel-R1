<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddcarController extends Controller
{
    public function create(){
        return view('addcar');
        }
        public function store(Request $request){
            echo "<pre>";
            print_r($request->all());

            }

}
