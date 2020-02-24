<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('profile',function(){
   return 'profile';
});

Route::redirect('profile','profile_new',301);

Route::get('profile_new',function(){
   return 'profile_new';
});

Route::view('welcome','home',['name'=>'ahmed']);

Route::get('post/{id}',function($id){
    return 'Post id : '.$id;
});

Route::get('post/{id}/comment/{comment}'
    ,function($post_id,$comment_id){
    return 'Post id : '.$post_id.
        ' , comment id : '.$comment_id;
});

/*Route::get('product/{id}',function($id){
    return 'product id : '.$id;
})->name('product');*/

Route::get('product/{id?}',function(){
    return '111111';
})->name('product');

Route::get('product-info',function(){
   return redirect()->route('product');
});

Route::middleware(['checkIp'])->group(function(){
   Route::get('dashboard',function(){
      return 'dashboard';
   });
});

//Route::get('reset','UsersController@reset');
Route::middleware(['checkIp','auth','throttle:3|rate_limit,1'])->group(function(){
    Route::get('reset',function(){
        return 'reset';
    });
});

Route::prefix('admin')->group(function(){
   Route::get('home',function(){
      return 'admin/home';
   });

    Route::get('profile',function(){
        return 'admin/profile';
    });

    Route::get('reset',function(){
        return 'admin/reset';
    });
});

/*Route::get('admin/home','UsersController@reset');
Route::get('admin/profile','UsersController@reset');
Route::get('admin/reset','UsersController@reset');*/


