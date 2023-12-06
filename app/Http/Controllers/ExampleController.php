<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;

class ExampleController extends Controller
{
   use Common;
    public function test1(){
        return view('login');
        }
        public function showUpload(){
            return view('upload');
        }
        public function upload(Request $request){
            // $file_extension = $request->image->getClientOriginalExtension();
            // $file_name = time() . '.' . $file_extension;
            // $path = 'assets/images';
            // $request->image->move($path, $file_name);
            // return 'Uploaded';

$fileName = $this->uploadFile($request->image, 'assets/images');
return '$fileName';
            }
        // public function upload(Request $request){
        //     return dd($request->image);
        // }
}
