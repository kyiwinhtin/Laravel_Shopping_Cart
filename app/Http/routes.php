<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'user'],function(){

	Route::group(['middleware' => 'auth'],function(){
		Route::get('profile',['uses' => 'UserController@getUserProfile','as' => 'user.profile']);
		Route::get('logout',['uses' => 'UserController@getLogOut','as' => 'user.logout']);
	});

	Route::group(['middleware' => 'guest'],function(){

		Route::get('signin',['uses' => 'UserController@getSignIn','as' => 'user.signin']);
		Route::post('signin',['uses' => 'UserController@postSignIn','as' => 'user.signin']);
		Route::get('signup',['uses' => 'UserController@getSignUp','as' => 'user.signup']);
		Route::post('signup',['uses' => 'UserController@postSignUp','as' => 'user.signup']);

	});

});



Route::group(['middleware' => 'auth'],function(){

	Route::get('forget-cart',function(){
		Session::forget('cart');
	});
	Route::get('reduce-by-one/{id}','ProductController@getReduceByOne');
	
	Route::get('reduce-by-one/{id}','ProductController@getRemoveItem');

	Route::get('add-to-cart/{id}',['uses' => 'ProductController@getAddtoCart','as' => 'product.addToCart' ]);

	Route::get('shopping-cart',['uses' => 'ProductController@getCart','as' => 'product.shoppingCart' ]);

	Route::get('checkout',['uses' => 'ProductController@getCheckOut','as' => 'checkout']);
	Route::post('checkout',['uses' => 'ProductController@postCheckOut','as' => 'checkout']);




});


Route::get('test',function(){
		Session::forget('cart');
});

Route::get('/',[
    'uses' => 'ProductController@index',
    'as'	=> 'product.index'
]);
