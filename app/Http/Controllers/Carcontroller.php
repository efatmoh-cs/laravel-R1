<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\Category;
use App\Models\Post;
use App\Traits\Common;
use Spatie\Backtrace\File;

class Carcontroller extends Controller

{
 use Common;
    private $columns=['cartitle','desciption','image','category_id'] ;

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
        $categories = Category::select('id','categoryName')->get();
        return view('addcar',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
//     {
//        $cars = new Car();
//        $cars->cartitle = $request->cartitle;
//       // $cars->price = $request->price;
//        $cars->desciption = $request->desciption;

//       // $cars->published = true;

// if(isset($request->published)){
//     $cars->published=true;
// }else{
//     $cars->published=false;
// }

// $cars->save();
//         return 'Added Successfully';
//         }



    /**
     * Display the specified resource.
     */
    public function store(Request $request): RedirectResponse //-->insert with validation
    {

    //     $request->validate([
    //         'cartitle'=>'required|string|max:50',
    //         'desciption'=>'required|string',
    //     ]);

    //     $data = $request->only($this->columns);
    //     $data['published'] = isset($data['published'])? true : false;

    //    car ::create($data);
    //     return 'done';
    $messages= $this->messages();


    $data = $request->validate([
        'cartitle'=>'required|string',
        'desciption'=>'required|string',
        'image' =>'required|mimes:png,jpg,jpeg|max:2048',
        'category_id'=>'required|string',
    ], $messages);

    $fileName = $this->uploadFile($request->image, 'assets/images');
    $data['image']= $fileName;
    $data['published'] = isset($request['published']);
    Car::create($data);

   // return 'done';
   return redirect('cars');
    }

    public function show(string $id)
    {
        $car = car::findOrFail($id);
      return view('showDetails', compact('car'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

      $cars = car::findOrFail($id);
      return view('updatecar', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     */

    //  public function update(Request $request, car $cars): RedirectResponse
    //  {
    //     $request->validate([
    //         'cartitle' => 'required',
    //         'desciption' => 'required'
    //     ]);

    //     $input = $request->all();

    //     if ($image = $request->file('image')) {
    //         $Path = 'assets/images/';
    //         $file_name= time() . '.' . $image->getClientOriginalExtension();
    //         $image->move($Path, $file_name);
    //         $input['image'] = "$file_name";
    //     }else{
    //         unset($input['image']);
    //     }

    //     $cars->update($input);

    //     return redirect('cars');






    public function update(Request $request, string $id)
    {

        // $data = $request->only($this->columns);
        // $data['published'] = isset($data['published'])? true:false;

        // Car::where('id', $id)->update($data);
        $messages= $this->messages();


        $data = $request->validate([
            'cartitle'=>'required|string',
            'desciption'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id'=>'required|string',
        ], $messages);

        $data['published'] = isset($request->published);

        // update image if new file selected
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image']= $fileName;
        }

        //return dd($data);
        Car::where('id', $id)->update($data);
        $categories = Category::select('id','categoryName')->get();
        //return view('updatecategory',compact('categories'));
        return 'Updated';

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {

        car::where('id', $id)->delete();//softdelete
        return redirect('trashedcar');
    }
    public function trashedcar(){
         $cars = car::onlyTrashed()->get();
         return view('trashedcar'
        , compact('cars'));
        }
        public function delete(string $id): RedirectResponse
 {
car::where('id', $id)->forceDelete(); //forcedelete
 return redirect('trashedcar');
}
 public function restore(string $id): RedirectResponse{

 car::where('id', $id)->restore();
 return redirect('cars');}


 public function messages(){
    return [
        'cartitle.required'=>'Title is required',
        'desciption.required'=> 'should be text',
    ];
}
}

