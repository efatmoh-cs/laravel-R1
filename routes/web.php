<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\AddcarController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewController;
use App\Models\News;

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
Route::get('addcar', [NewController::class,
'index']);
Route::post('addcar', [NewController::class,
'store'])->name('news');


// Route::post('car', [AddcarController::class,
// 'car']);
