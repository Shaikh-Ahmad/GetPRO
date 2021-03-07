<?php
use Illuminate\Support\Facades\Input;
use LaravelForum\User;
use LaravelForum\Profession;
use LaravelForum\Channel;

use LaravelForum\Notifications\NewReplyAdded;
use LaravelForum\Notifications\Markedasbestreply;

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
    $profession = Profession::all();
    return view('welcome2')->with('professions',$profession);
});

Auth::routes(['verify'=>true]);

Route::group(['middleware'=>['auth']], function(){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/hire', 'HireRequestController');

    Route::get('/dashboard', 'AdminController@index')->name('admin.dasboard');
    Route::get('/configusers', 'AdminController@configusers')->name('admin.dasboard.configusers');
    Route::get('/configposts', 'AdminController@configposts')->name('admin.dasboard.configposts');
    Route::get('/configdiscussions', 'AdminController@configdiscussions')->name('admin.dasboard.discussions');

    Route::delete('/configusers/{id}', 'AdminController@userdestroy')->name('user.destroy');
    Route::get('/test/{id}', 'AdminController@test');

    Route::group(['middleware'=>['checkrole']], function(){
        Route::post('discussion/{discussion}/replies/{reply}/markasbestreply','DiscussionsController@reply')->name('discussions.bestreply');
        Route::get('users/notifications','UsersController@notification')->name('users.notifications');
        Route::resource('discussions/{discussion}/replies','RepliesController');
        Route::resource('discussions','DiscussionsController');
        Route::resource('/post','PostController');
        Route::resource('/channel', 'ChannelController');
        
    
    });
});

Route::resource('/professions', 'ProfessionController');
Route::resource('/profiledetail', 'UserProfileDetailController');

Route::get('/search', 'UserProfileDetailController@search');
Route::get('/profession', 'UserProfileDetailController@profession')->name('profession');
// Route::get('notifications','NotificationsController@index')->name('notifications');

Route::get('clientLogin','Auth\LoginController@clientLogin')->name('clientLogin');
Route::get('registerUser','Auth\RegisterController@registerUser')->name('registerUser');
Route::get('/createprofile', 'UserProfileDetailController@createprofile')->name('createprofile');


Route::post('/channel/fetch', 'ChannelController@fetch')->name('channel.fetch');
