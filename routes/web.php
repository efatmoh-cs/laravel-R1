<?php

use Illuminate\Support\Facades\Route;

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

Route::get('user/{name}/{age?}', function ($name,$age=0) {
    $msg='the username is :'.$name;
    if($age >0) {
         $msg .= ' and age is :' .$age;
    }
   return $msg;


   // return 'the username is :'.$name . ' and age is :' .$age;
})-> whereIn('name',['Efat','MOHAMED']);

Route::get('about', function () {
    return ('ABOUT Bage');
});
Route::get('contacts', function () {
    return ('contacts us page');
});
Route::prefix('support')->group(function () {
    Route::get('chat', function(){
    return 'Chat page';
    });
    Route::get('call', function(){
    return 'call page';
    });
    Route::get('/ticket/{id?}', function ($id=0) {
        return 'The id is: ' . $id;
        })->where(['id'=> '[0-9]+']);
    });
    Route::prefix('training')->group(function () {
        Route::get('hr', function(){
        return 'HR page';
        });
        Route::get('markting', function(){
        return 'Marcting page';
        });
        Route::get('ict', function () {
            return 'ict page ';
            });
            Route::get('Logistics', function () {
                return 'Logistics page ';
                });
        });

