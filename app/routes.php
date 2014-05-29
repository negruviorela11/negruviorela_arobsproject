<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::any('create/account','UserController@createUser');
Route::any('confirm/user','UserController@confirmUser');
Route::any('list/users/{id}',  'UserController@listUsers');
Route::any('edit/my/account/{id}','UserController@editUser');
Route::any('login','UserController@getLogIn');
Route::any('signin','UserController@logIn');
Route::any('logout','UserController@getLogOut');
Route::any('change/my/password/{id}','UserController@changePassword');
Route::any('change','UserController@changePass');
Route::any('forgot/password','UserController@forgotPass');
Route::any('forgot','UserController@forgot');
Route::any('reset/my/password','UserController@reset');

Route::any('compose/message/{id}','EmailController@composeMessage');
Route::any('sendding','EmailController@send');
Route::any('inbox/{id}','EmailController@inbox');
Route::any('inboxEmails/{id}','EmailController@inboxEmails');
Route::any('drafts/{id}','EmailController@drafts');
Route::any('new/messages/{id}','EmailController@newMessages');
Route::any('view/message/{id}','EmailController@viewMessage');
Route::any('view/messages/{id}','EmailController@viewMessages');
Route::any('delete/message/{id}','EmailController@deleteMessage');
Route::any('sent/mails/{id}','EmailController@sent');
Route::any('delete/message/inbox/{id}','EmailController@deleteMessageInbox');
Route::any('delete/message/sent/{id}','EmailController@deleteMessageSent');
Route::any('delete/message/draft/{id}','EmailController@deleteMessageDraft');

Route::any('dashboard/{id}','SiteController@dashboard');
Route::any('','SiteController@listPage');