<?php
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('auth.login');
});
Route::get('jas',function(){
    return view('Javascript');
});
Route::get('premium','PremiumController@getPremium')->name('getpremium');
Route::get('insert','PremiumController@insertProduct')->name('insert');

Route::get('/product_get', 'ProductController@product_get')->name('product_get');
Route::post('/product_post', 'ProductController@product_post')->name('product_post');
Route::get('/view/{id}', 'ProductController@viewproduct')->name('viewproduct');
Route::get('/edit/{id}','ProductController@editproduct')->name('editproduct');
Route::post('/updated','ProductController@updateproduct')->name('updateproduct');
Route::get('delete/product/{id}','ProductController@productdestroy')->name('productdestroy');
Route::get('/index', 'ProductController@index')->name('index');
Route::post('/upload', 'ProductController@upload')->name('upload');
Route::get('/print','InvoiceController@printDetails' )->name('printsummary');

Route::get('/home','ProductController@getdashboard')->name('getdashboard');
Route::get('/product/{id}','ProductController@deleteexpire')->name('deleteexpire');

Route::get('/history','HistoryController@showHistory')->name('history');
Route::get('/getbill','InvoiceController@getbill')->name('getbill');
Route::post('/postbill','InvoiceController@printTable')->name('postbill');
Route::get('data','InvoiceController@printData2')->name('data');


