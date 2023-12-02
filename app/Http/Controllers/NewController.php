<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\News;

class NewController extends Controller
{
    private $columns=['title','description','auth','published'] ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::get();
        return view('editnew', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("news");
    }

    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
//     {
//         $news = new News();
//       $news->title = $request->title;
//       $news->auth = $request->auth;
//       $news->description = $request->description;
//      // $news->published = true;

// if(isset($request->published)){
//     $news->published=true;
// }else{
//     $news->published=false;
// }

// $news->save();
//        return 'Added Successfully';
//     }

public function store(Request $request)//-->insert with validation
    {

        $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
        ]);

        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;

       News ::create($data);
        return 'done';
    }


    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('shownew', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // $cars = News::findOrFail($id);

        // return "the new".$id;
        $news = News::findOrFail($id);
return view('updatenew', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        News::where('id', $id)->update($request->only($this->columns));
        return ('update');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id): RedirectResponse
    {

        News::where('id', $id)->delete();  //softdelete
        return redirect('trashed');


    }
    public function trashed(){
        $news = News::onlyTrashed()->get();
        return view('trashed'
        , compact('news'));
    }
    public function delete(string $id): RedirectResponse
    {

        News::where('id', $id)->forceDelete();  //forcedelete
        return redirect('trashed');


    }
    public function restore(string $id): RedirectResponse
    {

        News::where('id', $id)->restore();  //restore
        return redirect('editnew');


    }
}
