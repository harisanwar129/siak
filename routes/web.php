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
// Route::get('kirimemail',function(){
//     \Mail::raw('halo siswa baru',function($message){
//         $message->to('siswabaru@gmail.com','basrul');
//         $message->subject('Pendaftaran siswa');
//     });
// });


Route::get('/','SiteController@home');
Route::get('/register','SiteController@register');
Route::post('/postregister','SiteController@postregister');
// Route::get('/about','SiteController@about');
Route::get('/login','AuthController@index')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware'=>['auth','checkRole:admin']],function(){

Route::get('/siswa','SiswaController@index');
Route::post('/siswa/create','SiswaController@create');
Route::get('/siswa/{siswa}/edit','SiswaController@edit');
// Route::get('/siswa/{id}/edit','SiswaController@edit');
Route::post('/siswa/{siswa}/update','SiswaController@update');
// Route::post('/siswa/{id}/update','SiswaController@update');
Route::get('/siswa/{siswa}/delete','SiswaController@delete');
// Route::get('/siswa/{id}/profile','SiswaController@profile');
Route::get('/siswa/{siswa}/profile','SiswaController@profile');
// Route::get('/siswa/{id}/profile','SiswaController@profile');
Route::post('/siswa/{id}/addnilai','SiswaController@addnilai');
Route::get('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');
Route::get('/siswa/exportExcel','SiswaController@exportExcel');
Route::get('/siswa/exportPdf','SiswaController@exportPdf');
Route::post('/siswa/import','SiswaController@importexcel')->name('siswa.import');
Route::get('/guru/{id}/profile','GuruController@profile'); 
Route::get('/posts','PostController@index')->name('posts.index'); 
Route::get('post/add',[
'uses'=>'PostController@add',
'as'=>'posts.add'

]);
Route::post('post/create',[
'uses'=>'PostController@create',
'as'=>'posts.create'

]);
});

// Route::group(['middleware'=>['auth','checkRole:admin,siswa']],function(){
// Route::get('/dasboard','DasboardController@index');
// Route::get('/siswa/{siswa}/edit','SiswaController@edit');
// });

Route::group(['middleware'=>['auth','checkRole:siswa']],function(){

    Route::get('/siswa/{siswa}/edit','SiswaController@edit');
    Route::get('profilsaya','SiswaController@profilsaya');
  
});

Route::group(['middleware'=>['auth','checkRole:admin,siswa']],function(){
    Route::get('/dasboard','DasboardController@index');
      Route::get('/forum','ForumController@index');
    Route::post('/forum/create','ForumController@create');
    Route::get('/forum/{forum}/view','ForumController@view');
});

Route::get('getdatasiswa',[
'uses'=>'SiswaController@getdatasiswa',
'as'=>'ajax.get.data.siswa',

]);

Route::get('/{slug}',[
'uses'=>'SiteController@singlepost',
'as'=>'site.single.post',

]);
