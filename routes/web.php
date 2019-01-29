<?php 


/*
*   Home
*/

// Route::get('/fredo',function () {

// 	$friend = Auth::user()->friendsOfMine();
// 	dd($friend);

// });

Route::get('/',[
	'uses'=>'\App\Http\Controllers\HomeController@index',
	'as'=>'home',
]);


/**
 *  Authentication
 */
Route::get('/signup', [
	'uses' => '\App\Http\Controllers\AuthController@getSignup',
	'as'   => 'ajagbe',
	'middleware' => ['guest']
	]);

Route::post('/signup', [
	'uses' => '\App\Http\Controllers\AuthController@postSignup',
	'as'   => 'auth.signup',
	'middleware' => ['guest'],
	]);

Route::get('/signin', [
	'uses' => '\App\Http\Controllers\AuthController@getSignin',
	'as'   => 'auth.signin',
	'middleware' => ['guest'],
	]);

Route::post('/signin', [
	'uses' => '\App\Http\Controllers\AuthController@postSignin',
	'middleware' => ['guest'],
	]);

Route::get('/signout', [
	'uses' => '\App\Http\Controllers\AuthController@getSignout',
	'as'  =>  'auth'
	]);
/**
 * Search
 */

Route::get('/search',[
	'uses' => '\App\Http\Controllers\SearchController@getResults',
	'as'  => 'search.results'
	]);

/**
 * UserProfile
 */

Route::get('/user/{username}', [
	'uses' => '\App\Http\Controllers\ProfileController@getProfile',
	'as'   => 'profile.index'
]);

Route::get('/profile/edit',[
	'uses' => '\App\Http\Controllers\ProfileController@getEdit',
	'as'   => 'profile.edit',
	'middleware' => ['auth'], //so if they aint logged in they cant access these pages
]);

Route::post('/profile/edit',[
	'uses' => '\App\Http\Controllers\ProfileController@postEdit',
	'middleware' => ['auth'], //so if they aint logged in they cant access these pages
]);


/**
 * Friends
 */
Route::get('/friends',[
	'uses' => '\App\Http\Controllers\FriendController@getIndex',
	'as'   => 'friends.index',
	'middleware' => ['auth'], //so if they aint logged in they cant access these pages
]);

Route::get('/friends/add/{username}',[
	'uses' => '\App\Http\Controllers\FriendController@getAdd',
	'as'   => 'friends.add',
	'middleware' => ['auth'], //so if they aint logged in they cant access these pages
]);

Route::get('/friends/accept/{username}',[
	'uses' => '\App\Http\Controllers\FriendController@getAccept',
	'as'   => 'friends.accept',
	'middleware' => ['auth'], //so if they aint logged in they cant access these pages
]);

Route::post('/status', [
	'uses' => '\App\Http\Controllers\StatusController@postStatus',
	'as'   => 'status.post',
	'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/reply', [
	'uses' => '\App\Http\Controllers\StatusController@postReply',
	'as'   => 'status.reply',
	'middleware' => ['auth'],
]);

Route::get('/status/{statusId}/like', [
	'uses' => '\App\Http\Controllers\StatusController@getLike',
	'as'   => 'status.like',
	'middleware' => ['auth'],
]);