<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\AddcarController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PlaceController;
use App\Models\Car;
use App\Models\News;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('user/{name}/{age?}', function ($name,$age=0) {
//     $msg='the username is :'.$name;
//     if($age >0) {
//          $msg .= ' and age is :' .$age;
//     }
//    return $msg;


//    // return 'the username is :'.$name . ' and age is :' .$age;
// })-> whereIn('name',['Efat','MOHAMED']);

// Route::get('about', function () {
//     return ('ABOUT Bage');
// });
// Route::get('contacts', function () {
//     return ('contacts us page');
// });
// Route::prefix('support')->group(function () {
//     Route::get('chat', function(){
//     return 'Chat page';
//     });
//     Route::get('call', function(){
//     return 'call page';
//     });
//     Route::get('/ticket/{id?}', function ($id=0) {
//         return 'The id is: ' . $id;
//         })->where(['id'=> '[0-9]+']);
//     });
//     Route::prefix('training')->group(function () {
//         Route::get('hr', function(){
//         return 'HR page';
//         });
//         Route::get('markting', function(){
//         return 'Marcting page';
//         });
//         Route::get('ict', function () {
//             return 'ict page ';
//             });
//             Route::get('Logistics', function () {
//                 return 'Logistics page ';
//                 });
//         });



        // Route::fallback(function() {
        //     return redirect('/');
        //     });

        Route::get('cv', function () {
            return view('cv');
        });
        Route::get('login', function () {
            return view('login');
        });
        Route::post('receive', function () {
            return ('DATA receive');
        })->name('receive');

        Route::get('test1', [ExampleController::class,
'test1']);
Route::get('showUpload', [ExampleController::class,
'showUpload']);
Route::post('upload',[ExampleController::class, 'upload'])->name('upload');
Route::get('place', [ExampleController::class,
'place']);
Route::get('addplace', [PlaceController::class,
'create']);
Route::post('addplace', [PlaceController::class,
'store'])->name('addplace');
Route::get('showexploer', [PlaceController::class, 'index']);
Route::get('placelist', [PlaceController::class, 'create']);
Route::get('deleteplace/{id}', [PlaceController::class, 'destroy']);

// Route::get('addcar', function () {
//     return view('addcar');
//  });
// Route::post('receive1', function () {
//     return ('DATA receive');
// })->name('receive1');


// Route::get('/post/create', [AddcarController::class,
// 'create']);
// Route::post('/post/create', [AddcarController::class,
// 'store']);
Route::get('news', [NewController::class,
'create']);
Route::post('news', [NewController::class,
'store'])->name('news');
Route::get('editnew', [NewController::class, 'index']);
Route::get('editnew/{id}', [NewController::class,
'edit']);
Route::get('soft_delete/{id}', [NewController::class,'destroy']);
Route::get('trashed', [NewController::class,'trashed']);
Route::get('force-delete/{id}', [NewController::class,'delete']);
Route::get('restorenew/{id}', [NewController::class,'restore']);

Route::get('shownew/{id}', [NewController::class,'show'])->name('shownew');
Route::put('updatenew/{id}', [NewController::class,
'update'])->name('updatenew');
Route::get('addcar', [CarController::class,
'create']);


Route::post('storecar', [CarController::class,
'store'])->name('storecar');
Route::get('cars', [CarController::class, 'index']);
Route::get('editcar/{id}', [CarController::class,
'edit']);
Route::get('deletecar/{id}', [CarController::class,'destroy']);
Route::get('showcar/{id}', [CarController::class,'show'])->name('showcar');
Route::put('updatecar/{id}', [CarController::class,
'update'])->name('updatecar');
Route::get('trashedcar', [CarController::class,'trashedcar']);
Route::get('force-delete/{id}', [CarController::class,'delete']);
Route::get('restorecar/{id}', [CarController::class,'restore']);



Route::get('addproduct', [ProductController::class,
'create']);
Route::post('addproduct', [ProductController::class,
'store'])->name('addproduct');

// Route::post('car', [AddcarController::class,
// 'car']);
