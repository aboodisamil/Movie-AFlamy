<?php

use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->name('dashboard.')->group(function (){
    //welocome route
    Route::get('/' , 'WelcomeController@index')->name('welcome');

   //cateogry route
    Route::resource('categories' , 'CategoryController');
});


Route::get('/home', 'HomeController@index')->name('home');
