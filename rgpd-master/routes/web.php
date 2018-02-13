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

//Front
//Home
Route::get('/', function () {return view('homes.index');})->name('home');
//Contact
Route::get('/contact','ContactController@show')->name('contact');
Route::post('/contact','ContactController@contact');

//Admin
// Authentication Routes...
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('admin/register', 'Auth\RegisterController@register');
//Demandes Ressource
Route::get('admin', 'Admin\DemandeController@index');
Route::get('admin/demande/{demande}/destroy', 'Admin\DemandeController@showDestroyForm')->name('demande.destroyform');
Route::resource('admin/demande','Admin\DemandeController');
//Commentaires Ressource
Route::resource('admin/commentaire','Admin\CommentairesController',['only' =>['store']]);
//Liens Routes
Route::get('admin/lien/create/{demande_id}', 'Admin\LiensController@create')->name('lien.create');
Route::post('admin/lien', 'Admin\LiensController@store')->name('lien.store');
Route::get('admin/lien/{lien}/edit', 'Admin\LiensController@edit')->name('lien.edit');
Route::put('admin/lien/{lien}', 'Admin\LiensController@update')->name('lien.update');
//Client/Recherche Routes
Route::get('admin/client/recherche', 'Admin\Client\RecherchesController@index')->name('recherche.index');
Route::post('admin/client/recherche', 'Admin\Client\RecherchesController@search')->name('recherche.search');

